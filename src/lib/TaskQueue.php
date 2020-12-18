<?php

namespace ascio\lib;

use ascio\logic\BlockPayload;
use ascio\logic\CallbackPayload;

use ascio\logic\Payload;

class TaskQueue {
    public static function consume()    {        
        Consumer::callback(function(Payload $payload) {
            if($payload instanceof BlockPayload) {
                DomainBlocker::block($payload->getObjectName());
                return;
            }
            Ascio::setConfig($payload->getConfig());
            /**
             * @var CallbackPayload $payload;
             */
            switch ($payload->getWorkflowStatus()) {
                case  OrderStatus::Completed : TaskQueue::submitNext($payload); break;
                case  OrderStatus::WaitingForUser : break; // parse SSL Token
                case  OrderStatus::Queued : TaskQueue::queue($payload); break;
            }
        });
    }
    public static function submitNext(CallbackPayload $payload) {         
        foreach ($payload->getOrder()->db()->next($payload->getWorkflowStatus(),$payload->getObjectName()) as $nextOrder) {
            $nextOrder->submit();
        } 
    }
    public static function queue(CallbackPayload $payload) {
        $order = $payload->getOrder();
        if(DomainBlocker::isBlocked($order->getObjectName()) || $order->db()->isBlocked() || $order->shouldQueue()) {
            echo $order->log(LogLevel::Warn,"Queue blocked");
            return; 
        }
        echo $order->log(LogLevel::Info,"Submitting queued");
        try {
            $order->submit();
        } catch (AscioOrderException $e) {
            $e->debug();
        }       
    }
    
}
