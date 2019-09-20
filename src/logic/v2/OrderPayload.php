<?php
namespace ascio\logic;
class OrderPayload  extends Payload{
    private $order;  
    private $orderId;
    private $orderStatus; 
    private $orderType;  
    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

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
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get the value of orderStatus
     */ 
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Set the value of orderStatus
     *
     * @return  self
     */ 
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get the value of orderType
     */ 
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set the value of orderType
     *
     * @return  self
     */ 
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }
    public function getObject() : ?BaseClass {
        return   $this->getOrder() ?: null;
    }
}
