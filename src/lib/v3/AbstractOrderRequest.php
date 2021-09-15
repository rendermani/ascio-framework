<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\v3;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\db\v2\QueueItemDb;
use ascio\db\v3\MessageDb;
use ascio\lib\AscioOrderException;
use ascio\lib\AscioOrderExceptionV3;
use ascio\lib\DomainBlocker;
use ascio\lib\OrderStatus;
use ascio\lib\OrderTask;
use ascio\lib\Producer;
use ascio\lib\StatusSerializer;
use ascio\lib\SubmitOptions;
use ascio\lib\TaskTrait;
use ascio\logic\BlockPayload;
use ascio\logic\OrderPayload;
use ascio\v2\QueueItem;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ReflectionClass;


class AbstractOrderRequest extends \ascio\service\v3\AbstractOrderRequest implements OrderInterface{
    use TaskTrait;
    private $task;
    protected $status;
    protected $result;
    public function __construct($parent=null)
    {
        parent::__construct($parent);
        $this->setWorkflowStatus(OrderStatus::NotSet);
    }
    public function queue(?SubmitOptions $submitOptions=null) : OrderInterface {
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $this->setWorkflowStatus(OrderStatus::Queued); 
        $this->setPreviousId();
        $this->produce(["action"=>"create"]);
        //immediately pickup order with the order-queue and submit it
        //if an order is running, the order-queue won't submit. However it's unnecessary network traffic and better to 
        //only submit the first order. The others will be processed after the first is completed 
        if($this->submitOptions->getSubmitAfterQueue()) {
            $payload = new OrderPayload($this);
            $payload->setWorkflowStatus(OrderStatus::Queued);
            $payload->setOrder($this);
            $payload->send();

        }        
        return $this;
    }
    public  function getObjectKey() : string {
        throw new Exception("Please do not use the AbstractOrderRequest directly. Use inherited classes instead. ");
    }
    public function getObjectName() : ?string {
        throw new Exception("Please do not use the AbstractOrderRequest directly. Use inherited classes instead. ");
    }
    public function submit(?SubmitOptions $submitOptions=null) : ?OrderInfoInterface {     
        $this->createExtProperties();   
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions(); 
        $this->db()->_blocking = $this->submitOptions->getBlocking();
        if($this->shouldQueue()) {
            $this->queue();
            return null;
        } elseif(DomainBlocker::isBlocked($this->getObjectName())) {
            //echo $this->getStatusSerializer()->console(LogLevel::Warn,"Can't submit, queueing");
            $this->getSubmitOptions()->setSubmitAfterQueue(false);
            return $this->queue();
        } else {
            return $this->sendToApi();                                
        }
        return $this;
    }
    public function sendToApi(): ?OrderInfoInterface {
        $this->setWorkflowStatus(OrderStatus::Submitting); 
        $this->produce();
        $payload = new BlockPayload($this);            
        $payload->send();
        try {
            DomainBlocker::block($this->getObjectName());            
            $result = $this->api()->create();                
            $orderInfo = $result->getOrderInfo();
            $orderInfo->setObjectName($this->getObjectName());
            $this->lastResult = $result;
            $this->setOrderId($orderInfo->getOrderId());
            // don't create new ID's, use old ones for db update. Set $this.
            $orderInfo->setOrderRequest($this);
            //$this->produce(["action"=>"update"]);   
            $orderInfo->produce(["action"=>"create"]);
            // for the next submission
            $this->getSubmitOptions()->setQueue(true);
            return $orderInfo; 
        } catch (AscioOrderExceptionV3 $e) {
            $this->setWorkflowStatus(OrderStatus::Completed); 
            $orderInfo = $e->getOrder();
            $this->lastResult = $e->getResult();
            $this->setStatus($e->getStatus());
            $this->db()->_message = $this->lastResult->getResultMessage();
            $this->db()->_code = $this->lastResult->getResultCode();
            $this->db()->_values = json_encode($this->lastResult->getErrors());
            $this->produce(["action"=>"update"]);                
            throw $e; 
        } 
    }
    private function createExtProperties() {        
    }
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
    public function setWorkflowStatus($status=null) : AbstractOrderRequest {
        if($status==null && AbstractOrderRequest::mapWorkflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",AbstractOrderRequest::mapWorkflowStatus($this->getStatus()));
        } elseif(AbstractOrderRequest::mapWorkflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",AbstractOrderRequest::mapWorkflowStatus($status));
        }
        else {
            $class = new ReflectionClass(OrderStatus::class);
            if(!array_key_exists($status,$class->getConstants())) {
                throw new \Exception("Status must be one of ".implode(", ",$class->getConstants()). ". Got: ".$status);
            }
            $this->db()->setAttribute("_status", $status);
        }
        return $this; 
    }

    public function getResult() : CreateOrderResponse {
        return $this->lastResult;
    }
    /**
     * @return Response
     */
    public function validate()  {
        $result = $this->api()->getClient()->validateOrder($this);
        return $result;
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
        return $this->db()->OrderId;
    }

    /**
     * Set the value of orderId
     *
     * @return  self
     */ 
    public function setOrderId($orderId)
    {
        $this->db()->OrderId = $orderId;
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
    /**
     * Set the value of PreviousId
     *
     * @return  self
     */ 
    public function setPreviousId() 
    {
        global $PREVIOUS_TASK_ID, $PREVIOUS_OBJECT_NAME;

        if(!$this->db()->getKey()) {
            return $this;
        }
        if($PREVIOUS_TASK_ID && $PREVIOUS_TASK_ID == $this->db()->getKey()) {
            return $this;
        }
        if($PREVIOUS_OBJECT_NAME && $PREVIOUS_OBJECT_NAME == $this->getObjectName()) {
            $this->db()->_previousId = $PREVIOUS_TASK_ID;
        }
        $PREVIOUS_TASK_ID = $this->db()->getKey();
        $PREVIOUS_OBJECT_NAME = $this->getObjectName();
        return $this;
    }   
}