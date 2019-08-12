<?php
namespace ascio\lib;

use ascio\v2\Order;
use ascio\v2\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\Translation\Dumper\YamlFileDumper;

require(__DIR__."/../vendor/autoload.php");
Ascio::setConfig();

function status (Order $order, $status) {
    $domainName = $order->getDomain()->getDomainName();
    return "[order-queue] ".$status . " - ".$order->getType()." ". $domainName."\n";
    
}
//todo: clustering - loadbalance partitions per domain

Consumer::callback(function($payload) use ($log) {
    /**
     * @var Order $order
     */
    $status = Order::mapWorflowStatus($payload->OrderStatus);
    if($status == OrderStatus::Completed) {
        try {
            $order = new Order();  
            $order->createDomain()->setDomainName($payload->DomainName);
            echo status($order,"Completed (".$payload->OrderStatus.")");
            DomainBlocker::unblock($payload->DomainName);
            $newOrder = $order->db()->nextDomain($payload->DomainName);
            echo status($newOrder,"Process next Domain");
        } catch (ModelNotFoundException $e) {            
            // do nothing if domain not in the database or no next domain. 
            return; 
        }        
    } elseif ($status == OrderStatus::Queued) {
        /**
         * @var Order $newOrder
         */
        $newOrder = $payload->object;
        if(DomainBlocker::isBlocked($newOrder->getDomain()->getDomainName()) || $newOrder->db()->isBlocked() || $newOrder->shouldQueue()) {
            echo status($newOrder,"Domain blocked by other process");
            return; 
        }
        echo status($newOrder,"Process Queued");
    } elseif ($status == OrderStatus::Submitting) {
        DomainBlocker::block($payload->DomainName);
        return;
    } else {
        return;
    }
    try {
        $newOrder->submit();
        echo status($newOrder,"Submitted");  
    } catch (AscioException $e) {
        echo status($newOrder,$e->getMessage());
        DomainBlocker::unblock($newOrder);
        Producer::log($newOrder,[
            "messageType" => "error",
            "orderId" => $newOrder->getOrderId(),
            "message" => $e->getMessage(),
            "code" => $e->getCode()
        ]);
    }
    
});
