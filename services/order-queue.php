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

function status (Order $order, $status) {
    $domainName = $order->getDomain()->getDomainName();
    $date = date('m/d/Y h:i:s a', time());
    return "[order-queue] ".$date." - ".$status . " - ".$order->getType().": ". $domainName."\n";
    
}
//todo: clustering - loadbalance partitions per domain
Consumer::callback(function($payload) use ($log) {
    $txt = "";
    /**
     * @var Order $order
     */
    $status = Order::mapWorflowStatus($payload->OrderStatus) ?: $payload->OrderStatus;
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
            $order->setStatus($msg->getStatus());
            echo $order->getStatusSerializer()->console(LogLevel::Info,"Completed");
            DomainBlocker::unblock($payload->DomainName);
            $newOrder = $order->db()->nextDomain($payload->DomainName);
            $text = " next";
        } catch (ModelNotFoundException $e) {            
            // do nothing if domain not in the database or no next domain. 
            return; 
        }        
    } elseif ($status == OrderStatus::Queued) {
        $newOrder = $payload->object;
        if(DomainBlocker::isBlocked($newOrder->getDomain()->getDomainName()) || $newOrder->db()->isBlocked() || $newOrder->shouldQueue()) {
            echo $newOrder->getStatusSerializer()->console(LogLevel::Warn,"Queue blocked");
            return; 
        }
        $txt = " queued";
    } elseif ($status == OrderStatus::Submitting) {
        $serializer = new StatusSerializer();
        $serializer->setFields(["DomainName"=>$payload->DomainName]);
        echo $serializer->console(LogLevel::Info,"Received block");
        DomainBlocker::block($payload->DomainName);
        return;
    } else {
        $payload->object->getStatusSerializer(LogLevel::Info,"No action for ".$status);
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
