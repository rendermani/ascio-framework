<?php
namespace ascio\logic\v3;

use ascio\base\OrderInterface;
use ascio\logic\CallbackPayload as CBPayload;

class CallbackPayload extends CBPayload {
    /**
     * Get the value of objectType
     */ 
    public function getObjectType() : string
    {
        return "ascio\\v3\\".$this->objectType;
    }
        /**
     * Create an order
     *
     * @return  OrderInterface
     */ 
    public function createOrder() : OrderInterface
    {
        $name = str_replace("Type","",$this->getObject()->getObjectType())."OrderRequest";
        $name = "\\ascio\\v3\\".$name;
        $this->order = new $name();
        return $this->order;
    }
}
