<?php
namespace ascio\logic;

use ascio\lib\Producer;

class FrameworkLogic {
    public function process($payload) {
        switch($payload->module) {
            case "sync" : $this->sync(new SyncPayload($payload)); break;
            case "order" : $this->order(new OrderPayload($payload)); break;
            case "callback" : $this->callback(new CallbackPayload($payload));break;
            case "status" : //todo ;break;
            case "log" : //todo ;break;
        }
    }
    protected function callback(CallbackPayload $payload) {
       //topic callback
        switch ($payload->getModule()) {
            case "poll" : 
            case "callback" : $this->orderCallback(new SyncPayload($payload)); break;
            case "sync" : $this->syncCallback(new SyncPayload($payload)); break;
            case "order" : $this->updateDb(new OrderPayload($payload)); break;
            case "db" : break;
            case "status" : break;
        }
    }
    protected function orderCallback(SyncPayload $payload) {
        Producer::sync($payload);
        $this->updateDb($payload);
    }
    protected function syncCallback(SyncPayload $payload) {
        /* if($payload->getOrder()) {
            $queueLogic = new QueueLogic(new OrderPayload($payload));
            if($queueLogic->hasNext()) {
                $queueLogic->processNext();
            }
        } */
        $this->updateDb($payload); 
    }
    protected function order(OrderPayload $payload) {
        $queueLogic = new QueueLogic($payload);
        $queueLogic->submit();
        $this->updateDb($payload);
    }
    protected function updateDb(Payload $payload) {
        if($payload->getObject()) {
            $payload->getObject()->produce();
        }
    }
    protected function consume($function) {

    }
    protected function sync (SyncPayload $payload) {

    }

}