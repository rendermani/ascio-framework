<?php
namespace ascio\logic\v2;

use ascio\base\OrderInterface;
use ascio\logic\CallbackPayload as CBPayload;
use ascio\v2\Order;

class CallbackPayload extends CBPayload {
    /**
     * Get the value of objectType
     */ 
    public function getObjectType() : string
    {
        return "ascio\\v2\\Order";
    }
    public function createOrder() : OrderInterface
    {
        $this->order = new Order(); 
        return $this->order;
    }
}