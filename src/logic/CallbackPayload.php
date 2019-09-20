<?php
namespace ascio\logic;

use ascio\v2\QueueItem;

class CallbackPayload extends Payload{
    private $orderId;
    private $orderStatus; 
    private $orderType; 
    private $msgId;
    private $queueItem;
    private $api;
    private $callbackType;

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
     * Get the value of msgId
     */ 
    public function getMsgId()
    {
        return $this->msgId;
    }

    /**
     * Set the value of msgId
     *
     * @return  self
     */ 
    public function setMsgId($msgId)
    {
        $this->msgId = $msgId;

        return $this;
    }

    /**
     * Get the value of queueItem
     */ 
    public function getQueueItem() : QueueItem
    {
        return $this->queueItem;
    }

    /**
     * Set the value of queueItem
     *
     * @return  self
     */ 
    public function setQueueItem($queueItem)
    {
        $this->queueItem = $queueItem;

        return $this;
    }

    /**
     * Get the value of api
     */ 
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Set the value of api
     *
     * @return  self
     */ 
    public function setApi($api)
    {
        $this->api = $api;

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

    /**
     * Get the value of callbackType
     */ 
    public function getCallbackType()
    {
        return $this->callbackType;
    }

    /**
     * Set the value of callbackType
     *
     * @return  self
     */ 
    public function setCallbackType($callbackType)
    {
        $this->callbackType = $callbackType;

        return $this;
    }
    public function getObject() : ?BaseClass {
        return $this->getQueueItem() ?: null;
    }
}
