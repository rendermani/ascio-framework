<?php

namespace ascio\logic;

use ascio\base\DbModelBase;
use ascio\lib\Actions;

Class QueueLogic {
    protected $payload;
    protected $next;
    public function __construct(OrderPayload $payload)
    {
        $this->payload = $payload;
    }
    public function getStatus () {

    }
    public function completed() {
        $this->next();
    }
    public function failed() {
        $order = $this->payload->order; 
        if(!$this->payload->Blocking) {
            $this->next();
        }
        if($this->payload->Code == 554) {
            $this->retry(10);
        }
    }
    public function blocked() {

    }
    public function queued() {

    }
    public function hasNext() {

    }
    public function processNext() {
        // get next linked task
        // v2,v3,task
        // produce topic, object
    }
    public function autoUnlock() {

    }
    public function autoLock() {
        
    }
    public function submit() {

    }
    public function retry($waitSeconds=null) {
        $cron = new Cron();
        $cron->startInSeconds($waitSeconds);
        $cron->submit("order",["action" => "retry","id",$this->payload->id]);
    }
    public function getData(DbModelBase $db,$id) {

    }
    public function setStatus() {

    }
}