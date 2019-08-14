<?php
namespace ascio\lib;

use ascio\service\v2\QueueItem;
use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use DateTime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

//TODO: clustering - loadbalance partitions per domain
Consumer::callback(function($payload) use ($log) {
    $txt = "";
    /**
     * @var Order $order
     */
    $status = Order::mapWorflowStatus($payload->OrderStatus);
    /**
     * @var Order $newOrder
     */
    if($status == OrderStatus::Completed) {
        try {
            /**
             * @var QueueItem $msg
             */
            $msg = $payload->object;
            $order = new Order();  
            $order->db()->getByOrderId($payload->OrderId);  
            $order->setStatus($msg->getOrderStatus());
            $order->setWorkflowStatus();
            echo $order->getStatusSerializer()->console(LogLevel::Info,"Completed");
            DomainBlocker::unblock($payload->DomainName);
            $newOrder = $order->db()->nextDomain($payload->DomainName);
            $order->setWorkflowStatus(OrderStatus::Submitting);
            $text = " next";
        } catch (ModelNotFoundException $e) {
            return; 
        }        
    } elseif ($status == OrderStatus::Queued) {
        $newOrder = $payload->object;
        if(DomainBlocker::isBlocked($newOrder->getDomain()->getDomainName()) || $newOrder->db()->isBlocked() || $newOrder->shouldQueue()) {
            $newOrder->setStatus(OrderStatusType::NotSet);
            echo $newOrder->getStatusSerializer()->console(LogLevel::Warn,"Queue blocked");
            return; 
        }
        $txt = " queued";
    } elseif ($status == OrderStatus::Submitting) {
        $serializer = new StatusSerializer();
        $serializer->setFields($payload);
        echo $serializer->console(LogLevel::Info,"Block");
        DomainBlocker::block($payload->DomainName);
        return;
    } else {
        echo $payload->object->getStatusSerializer(LogLevel::Info,"No action for ".$status);
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
