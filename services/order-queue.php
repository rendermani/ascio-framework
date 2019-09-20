<?php
namespace ascio\lib;

use ascio\service\v2\QueueItem;
use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Translation\Dumper\YamlFileDumper;
use test\Domain;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

//TODO: clustering - loadbalance partitions per domain
Consumer::callback(function($payload) use ($log) {
    /**
     * @var Order $order
     */
    $status = Order::mapWorflowStatus($payload->OrderStatus);
    /**
     * @var Order $newOrder
     */
    if(
            $status == OrderStatus::Completed && 
            $payload->OrderStatus !== OrderStatusType::Invalid
    ) {
        $order = new Order();  
        try {
            $order->db()->getByOrderId($payload->OrderId);
        } catch (ModelNotFoundException $e) {
            echo "OrderId: ".$payload->OrderId,$e->getMessage()."\n";
        }
        try {
            /**
             * @var QueueItem $msg
             */
            $msg = $payload->object;       
            $order->setStatus($msg->getOrderStatus());
            $order->setWorkflowStatus();
            echo $order->getStatusSerializer()->console(LogLevel::Info,"Completed");
            DomainBlocker::unblock($payload->DomainName);
            $newOrder = $order->db()->nextDomain($payload->DomainName);
            $text = " next";
        } catch (ModelNotFoundException $e) {
            return; 
        }        
    } elseif ($status == OrderStatus::Queued) {
        $newOrder = $payload->object;
        if(DomainBlocker::isBlocked($newOrder->getDomain()->getDomainName()) || $newOrder->db()->isBlocked() || $newOrder->shouldQueue()) {
            // if another process running don't submit. Leave queued. Will pickup the
            // next order from the DB
            $newOrder->setStatus(OrderStatusType::NotSet);
            echo $newOrder->getStatusSerializer()->console(LogLevel::Warn,"Queue blocked");
            return; 
        }
    } elseif ($status == OrderStatus::Submitting) {
        $serializer = new StatusSerializer();
        echo $serializer->setFields($payload)->console(LogLevel::Info,"Block");
        DomainBlocker::block($payload->DomainName);
        return;
    } else {
        echo $payload->object->getStatusSerializer()->console(LogLevel::Info,"No action for ".$payload->object->getOrderStatus());
        return;
    }
    try {
    
        echo $newOrder->getStatusSerializer()->console(LogLevel::Info,"Submit".$text);
        $newOrder->submit();
    } catch (AscioException $e) {
        echo $newOrder->getStatusSerializer()->console(LogLevel::Error,$e->getMessage());
        DomainBlocker::unblock($payload->DomainName);
        Producer::log($newOrder,[
            "messageType" => "error",
            "orderId" => $newOrder->getOrderId(),
            "message" => $e->getMessage(),
            "code" => $e->getCode()
        ]);
    }
    
});
