<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\db\v3\MessageDb;
use ascio\lib\AscioException;
use ascio\lib\OrderStatus;
use ascio\lib\StatusSerializer;
use ascio\service\v3\OrderStatusType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ReflectionClass;

class OrderInfo extends \ascio\service\v3\OrderInfo implements OrderInfoInterface {
    protected $objectName; 
    public static function mapWorkflowStatus($status) {
        switch($status) {
            case OrderStatusType::Completed :
            case OrderStatusType::Failed    :
            case OrderStatusType::Invalid   : return OrderStatus::Completed;
            case OrderStatus::Queued        : return OrderStatus::Queued;
            case OrderStatus::Submitting    : return OrderStatus::Submitting;
            case OrderStatus::Stored        : return OrderStatus::Stored;
            default                         : return OrderStatus::Running;
        }
    }
    public function setWorkflowStatus($status=null) : self {
        if($status==null && AbstractOrderRequest::mapWorkflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",AbstractOrderRequest::mapWorkflowStatus($this->getStatus()));
        } else {
            $class = new ReflectionClass(OrderStatus::class);
            if(!array_key_exists($status,$class->getConstants())) {
                throw new \Exception("Status must be one of ".implode(", ",$class->getConstants()). ". Got: ".$status);
            }
            $this->db()->setAttribute("_status", $status);
        }
        return $this; 
    }

    public function getResult() {
        return $this->lastResult;
    }
    /**
     * @return Order
     */
    public function syncOld($orderId) {
        $this->setOrderId($orderId);
        try {
            $this->db()->getByOrderId($orderId);
    } catch(ModelNotFoundException $e) {
            $this->syncApi();
        } 
        return $this;       
    }
    /**
     * @return Order 
     */
    public function syncApi() : OrderInfoInterface {        
        $this->api()->get();
        //$this->getDomain()->syncApi(); 
        if( $this->getStatus() == OrderStatusType::Failed ||
            $this->getStatus() == OrderStatusType::Invalid        
        ) {
            $this->db()->_blocked = true;
            $this->db()->save();
        }
        return $this;
    } 
    public function getWorkflowStatus() : string {
        if(!$this->db()->_status) {
            $this->setWorkflowStatus();
        }
        return $this->db()->_status; 
    }  
    /**
     * Get the array of Messages
     */ 
    public function getMessages()
    {
        if(count($this->Messages) > 0) return $this->Messages;
        $messageDb = new MessageDb();
        $messages =  $messageDb->orderId($this->getOrderId());       
        $this->Messages = new ArrayOfMessage();
        foreach($messages as $message) {
            $this->Messages->add($message);
        }
        return $this->Messages;
    }   
    public function getObjectNameOld() : ?string {
        return $this->getOrderId();
    }
    public function getObjectKey() : string {
        return "OrderId";
    } 
    public function getStatusSerializer() : StatusSerializer
    {      
        parent::getStatusSerializer()->addFields([
            "OrderId" => $this->getOrderId(),
            "OrderType" => $this->getOrderRequest()->getType(),
            "Status" => $this->getStatus() . " (".$this->getWorkflowStatus().")"
        ]);
        return $this->_statusSerializer;
    }     

    /**
     * Get the value of objectName
     */ 
    public function getObjectName() : ?string
    {
        return $this->db()->_objectName ?: $this->getOrderRequest()->getObjectName();
    }

    /**
     * Set the value of objectName
     *
     * @return  self
     */ 
    public function setObjectName(?string $objectName = null)
    {
        if(!$objectName) {
            $objectName = $this->getObjectName();
        }
        $this->db()->_objectName = $objectName;
        
        return $this;
    }
}