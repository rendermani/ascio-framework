<?php
namespace ascio\logic;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\lib\Ascio;
use ascio\lib\TopicProducer;
use ascio\logic\v3\CallbackPayload as V3CallbackPayload;
use ascio\logic\v2\CallbackPayload as V2CallbackPayload;
use ascio\v3\OrderInfo;
use ascio\v3\QueueMessage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CallbackPayload extends Payload {

    public $order; 
    public $orderId;
    public $messageId;
    public $orderStatus;
    public $objectName;
    public $objectHandle;
    public $objectType;
    public $environment;
    public $account;
    public $module;
    public $queueMessage;
    public $orderInfo; 

    public function __construct(QueueMessage $payloadObj=null)
    {
        if($payloadObj) {
            parent::__construct($payloadObj);
            if($payloadObj) {
                $this->queueMessage = $payloadObj;    
                $this->orderId = $this->queueMessage->getOrderId();
                $this->messageId = $this->queueMessage->getId();
                $this->orderStatus = $this->queueMessage->getOrderStatus();
                $this->objectName = $this->queueMessage->getObjectName();
                $this->objectHandle = $this->queueMessage->getObjectHandle();
            }
            $this->objectType = str_replace("Type","",$this->queueMessage->getObjectType());
            $this->environment =  Ascio::getConfig()->getEnvironment();            
            $this->account = Ascio::getConfig()->get($this->getApi())->account;
            $this->module = "poll";            
        }
        parent::__construct($payloadObj);
    }
    /**
     * Get the order
     */ 
    public function getOrder() : OrderInterface
    {
        if($this->order) {
            return $this->order;
        } else {
            $this->createOrder();
            $this->order->db()->getByOrderId($this->getOrderId());
            return $this->order;
        }        
    }
        /**
     * Get the order
     */ 
    public function getOrderInfo() : OrderInfoInterface
    {
        if($this->orderInfo) {
            return $this->orderInfo;
        } else {
            $this->orderInfo = new OrderInfo();            
            $this->orderInfo->setOrderId($this->getOrderId());
            $this->orderInfo->db()->getByOrderId();
            $this->orderInfo->setOrderRequest($this->getOrder());
            return $this->orderInfo;
        }        
    }
    /**
     * Create an order
     *
     * @return  OrderInterface
     */ 
    public function createOrder() : OrderInterface
    {
        $name = $this->getObjectType();
        $this->order = new $name(); 
        $this->order->setOrderId($this->getOrderId());        
        return $this->order;
    }
    public function removeOrder() {
        $this->order = null; 
    }
    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get the value of messageId
     */ 
    public function getMessageId()
    {
        return $this->messageId;
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
    public function getObjectType() : ?string
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

    /**
     * Get the value of queueMessage
     */ 
    public function getQueueMessage()
    {
        return $this->queueMessage;
    }
    public function send() {
        TopicProducer::send("callback",$this); 
    }
    public static function getApiPayload(QueueMessage $message) : CallbackPayload {
        try {
            // API v3
            $payloadObj = new  V3CallbackPayload($message);
            $payloadObj->getOrder();
            $payloadObj->setApi("v3");
        } catch (ModelNotFoundException $e) {
            // API v2   
            $payloadObj = new V2CallbackPayload($message);
            $payloadObj->getOrder();
            $payloadObj->setApi("v2");       
        }
        $payloadObj->removeOrder();
        return $payloadObj;
    }
    public function getWorkflowStatus()
    {
        $order = $this->getOrder();
        $order->setWorkflowStatus($this->getOrderStatus());
        return $order->getWorkflowStatus();
    }
}
