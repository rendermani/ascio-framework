<?php
namespace ascio\logic;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\lib\OrderStatus;
use ascio\lib\TopicProducer;
use ascio\v2\Order;

class OrderPayload extends Payload {

    public $order; 
    public $orderId;
    public $orderStatus;
    public $objectName;
    public $objectHandle;
    public $objectType;
    public $environment;
    public $account;
    public $module;

    public function __construct($order=null)
    {      
       $this->setOrder($order);
       $this->setWorkflowStatus(OrderStatus::Queued);
       $this->setStatus(OrderStatus::Queued);
       $this->module = "order";
    }
        /**
     * Get the value of order
     * @return OrderInterface
     */ 
    public function getObject()
    {        
        return $this->getOrder();
    }
    /**
     * Get the value of order
     */ 
    public function getOrder() : OrderInterface
    {        
        return $this->order;
    }
    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder(OrderInterface $order)
    {
        $this->order = $order;
        $this->objectName = $order->getObjectName();
        $this->objectHandle = $order->handle()->getValue();
        $this->objectKey = $order->handle()->getKey();
        $this->objectType = get_class($order);
        $this->api = $order instanceof Order ? "v2" : "v3";        
        return $this;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get the value of orderStatus
     */ 
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Get the value of objectName
     */ 
    public function getObjectName()
    {
        return $this->objectName;
    }

    /**
     * Get the value of objectHandle
     */ 
    public function getObjectHandle()
    {
        return $this->objectHandle;
    }

    /**
     * Get the value of objectType
     */ 
    public function getObjectType() : string
    {
        return $this->objectType;
    }

    /**
     * Get the value of environment
     */ 
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * Get the value of account
     */ 
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Get the value of module
     */ 
    public function getModule()
    {
        return $this->module;
    }    
    public function send() {
        assert($this->getObject(),"Has an order");
        assert($this->getObject(),"Has a payload object");
        TopicProducer::send("callback",$this); 
    }

}
