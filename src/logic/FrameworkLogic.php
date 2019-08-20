<?php

namespace ascio\logic;

Class FameworkLogic {
    protected function receiveCallback() {
        //topic callback
        $this->requestSync();
    }
    protected function receivePollMessage() {
        //topic callback
        $this->requestSync();
    }
    protected function receiveSync() {
        //topic callback
        $this->updateDb();
    }
    protected function requestSync() {
        //topic callback
        //produce topic sync
    }
    protected function receiveOrder() {
        //topic order-request
        $this->sendOrder();
    }
    protected function sendOrder() {
        // produce topic order-queue
    }
    protected function updateDb() {
        // produce topic object
    }
    protected function process($payload) {
        switch($payload->module) {
            case "sync" : $this->receiveSync(); break;
            case "order" : $this->receiveOrder(); break;
            case "poll" : $this->receivePoll(); break;
            case "callback" : $this->receiveCallback(); break;
        }
    }
    protected function consume($function) {

    }

}