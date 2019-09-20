<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\v2;

use ascio\base\OrderInterface;
use ascio\base\TaskInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\OrderStatus;
use ascio\lib\Producer;
use ReflectionClass;
use ascio\lib\AscioOrderException;
use ascio\lib\SubmitOptions;
use ascio\service\v2\Domain;
use ascio\lib\DomainBlocker;
use ascio\lib\LogLevel;
use ascio\lib\StatusSerializer;
use ascio\lib\TaskTrait;
use Exception;

class Order extends \ascio\service\v2\Order implements OrderInterface, TaskInterface {       
    use TaskTrait;
    public $lastResult;
    /**
     * @var SubmitOptions $submitOptions
     */
    private $submitOptions; 
    public function __construct($parent=null)
    {
        parent::__construct($parent);
        $this->setWorkflowStatus(OrderStatus::NotSet);
    }
    public function queue(?SubmitOptions $submitOptions=null) : OrderInterface {
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $this->setWorkflowStatus(OrderStatus::Queued); 
        $this->produce(["action"=>"create"]);
        //immediately pickup order with the order-queue and submit it
        //if an order is running, the order-queue won't submit. However it's unnecessary network traffic and better to 
        //only submit the first order. The others will be processed after the first is completed 
        if($this->submitOptions->getSubmitAfterQueue()) {
            Producer::callback($this,[
                "OrderStatus"=> OrderStatus::Queued,
                "DomainName"=> $this->getDomain()->getDomainName(),
                "OrderType"=> $this->getType(),
                "OrderId"=> $this->getOrderId()
            ]);
        }        
        return $this;
    }
    public function submit(?SubmitOptions $submitOptions=null) : OrderInterface {        
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $domainName = $this->getDomain()->getDomainName();   
        $this->db()->_blocking = $this->submitOptions->getBlocking();
        if($this->shouldQueue()) {
            return $this->queue();
        } elseif(DomainBlocker::isBlocked($domainName)) {
            echo $this->getStatusSerializer()->console(LogLevel::Warn,"Can't submit, queueing");
            $this->getSubmitOptions()->setSubmitAfterQueue(false);
            return $this->queue();
        } else {
            $this->setWorkflowStatus(OrderStatus::Submitting); 
            Producer::callback(null,[
                "OrderStatus"=> OrderStatus::Submitting,
                "DomainName"=> $domainName,
                "OrderType"=> $this->getType()
            ]);    
            $action = $this->db()->_id ? "update" : "create";        
            $this->produce(["action"=> $action]);
            try {
                DomainBlocker::block($domainName);
                $result = $this->api()->getClient()->createOrder($this);
                $this->setWorkflowStatus(OrderStatus::Running);
                $order = $result->getOrder();
                $this->lastResult = $result->getCreateOrderResult();
                $this->set($order);
                echo $this->getStatusSerializer()->console(LogLevel::Info,"Submitted");
                $this->produce(["action"=>"update"]);   
                // for the next submission
                $this->getSubmitOptions()->setQueue(true);
            } catch (AscioOrderException $e) {
                $this->setWorkflowStatus(OrderStatus::Completed); 
                $order = $result->getOrder();
                $this->lastResult = $result->getCreateOrderResult();
                $this->set($order);
                $this->produce(["action"=>"update"]);                
                $e =  new AscioOrderException($result->getCreateOrderResult()->getMessage(),406);
                $e->setOrder($order);
                $e->setResult($e->method,$e->request,$e->status,$e->result);
                throw $e; 
            }                                 
        }
        return $this;
    }
    public static function mapWorflowStatus($status) {
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
    public function setWorkflowStatus($status=null) : Order {
        if($status==null && Order::mapWorflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",Order::mapWorflowStatus($this->getStatus()));
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
     * @return Response
     */
    public function validate()  {
        $result = $this->api()->getClient()->validateOrder($this);
        return $result->getValidateOrderResult();
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
    public function syncApi() : OrderInterface {        
        $this->api()->get();
        $this->getDomain()->syncApi(); 
        if( $this->getStatus() == OrderStatusType::Failed ||
            $this->getStatus() == OrderStatusType::Invalid        
        ) {
            $this->db()->_blocked = true;
            $this->db()->save();
        }
        return $this;
    }
    /**
     * @return ArrayOrMessage 
     */
    public function getMessages() {
        $this->api()->getClient()->getMessages($this->getOrderId()); 
    }
    public function getStatusSerializer() : StatusSerializer
    {      
        parent::getStatusSerializer()->addFields([
            "OrderId" => $this->getType(),
            "OrderType" => $this->getType(),
            "Status" => $this->getStatus() . " (".$this->getWorkflowStatus().")", 
            "DomainName" => $this->getDomain()->getDomainName()     
        ]);
        return $this->_statusSerializer;
    }
}