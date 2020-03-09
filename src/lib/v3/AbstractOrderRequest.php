<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInterface;
use ascio\db\v2\QueueItemDb;
use ascio\db\v3\MessageDb;
use ascio\lib\AscioOrderException;
use ascio\lib\AscioOrderExceptionV3;
use ascio\lib\DomainBlocker;
use ascio\lib\OrderStatus;
use ascio\lib\Producer;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\lib\TaskTrait;
use ascio\v2\QueueItem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ReflectionClass;

class AbstractOrderRequest extends \ascio\service\v3\AbstractOrderRequest implements OrderInterface{
    use TaskTrait;
    
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
                "ObjectName"=> $this->getObjectName(),
                "OrderType"=> $this->getType(),
                "Module" => "order"
            ]);
        }        
        return $this;
    }
    public  function getObjectKey() {
        throw new Exception("Please implement this");
        return null;
    }
    public function getObjectName() : ?string {
        throw new Exception("Please implement this");
        return null;
    }
    public function submit(?SubmitOptions $submitOptions=null) : OrderInterface {        
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions(); 
        $this->db()->_blocking = $this->submitOptions->getBlocking();
        if($this->shouldQueue()) {
            return $this->queue();
        } elseif(DomainBlocker::isBlocked($this->getObjectName())) {
            //echo $this->getStatusSerializer()->console(LogLevel::Warn,"Can't submit, queueing");
            $this->getSubmitOptions()->setSubmitAfterQueue(false);
            return $this->queue();
        } else {
            $this->setWorkflowStatus(OrderStatus::Submitting); 
            Producer::callback(null,[
                "OrderStatus"=> OrderStatus::Submitting,
                "ObjectName"=> $this->getObjectName(),
                "OrderType"=> $this->getType(),
                "Module" => "order"
            ]);    
            $action = $this->db()->_id ? "update" : "create";        
            $this->produce(["action"=> $action]);
            try {
                DomainBlocker::block($this->getObjectName());
                $result = $this->api()->getClient()->createOrder($this);
                $this->setWorkflowStatus(OrderStatus::Running);
                $order = $result->getOrder();
                $this->lastResult = $result->getCreateOrderResult();
                $this->set($order);
                //echo $this->getStatusSerializer()->console(LogLevel::Info,"Submitted");
                $this->produce(["action"=>"update"]);   
                // for the next submission
                $this->getSubmitOptions()->setQueue(true);
            } catch (AscioOrderException $e) {
                $this->setWorkflowStatus(OrderStatus::Completed); 
                $order = $e->getOrder();
                $this->lastResult = $e->result->getCreateOrderResult();
                $this->set($order);
                $this->db()->_message = $this->lastResult->getResultMessage();
                $this->db()->_code = $this->lastResult->getResultCode();
                $this->db()->_values = $this->lastResult->getErrors();
                $this->produce(["action"=>"update"]);                
                $e =  new AscioOrderExceptionV3 ($e->result->getResultMessage()->getMessage(),406);
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
    public function setWorkflowStatus($status=null) : AbstractOrderRequest {
        if($status==null && AbstractOrderRequest::mapWorflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",AbstractOrderRequest::mapWorflowStatus($this->getStatus()));
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
        //$this->getDomain()->syncApi(); 
        if( $this->getStatus() == OrderStatusType::Failed ||
            $this->getStatus() == OrderStatusType::Invalid        
        ) {
            $this->db()->_blocked = true;
            $this->db()->save();
        }
        return $this;
    }
    /**
     * @return Array 
     */
    private function getDbQueueItems() {
        $db = new QueueItemDb();
        foreach($db->byOrderId($this->getOrderId())->get() as $item) {
            $queueItem = new QueueItem();
            $queueItem->set($item);
            $this->QueueItems[] = $queueItem;
        } 
        return $this->QueueItems;
    }
    public function getStatusSerializer() : StatusSerializer
    {      
        parent::getStatusSerializer()->addFields([
            "OrderId" => $this->getOrderId(),
            "OrderType" => $this->getType(),
            "Status" => $this->getStatus() . " (".$this->getWorkflowStatus().")", 
            "ObjectName" => $this->getObjectName() ?: "Missing object name",
            "type" => "Domain"
        ]);
        return $this->_statusSerializer;
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
    /**
     * Get last Message
     */ 
    public function getLastMessage() : ?Message
    {
        if(count($this->Messages) > 0) return last($this->Messages);
        $messageDb = new MessageDb();
        $item =  $messageDb->orderId($this->getOrderId())->get()->last();     
        if(!$item) return null; 
        $message = new Message();
        $message->set($item);
        return $message; 
    }
        /**
     * Get the text of Messages
     */ 

    /**
     * Get the array of Messages
     */ 
    public function getQueueItems()
    {
        if(count($this->QueueItems) > 0) return $this->QueueItems;
        return $this->getDbQueueItems();
    }
        /**
     * Get the text of Messages
     */ 
    public function getLastQueueItem()
    {
        if(count($this->getQueueItems()) == 0) return null;

    
        return last($this->getQueueItems())->getMsg();
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId(): ?string
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
     * Get the value of status
     */ 
    public function getStatus() : ?string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}