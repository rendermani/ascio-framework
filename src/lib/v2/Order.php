<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\v2;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\base\TaskInterface;
use ascio\db\v2\MessageDb;
use ascio\db\v2\QueueItemDb;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\OrderStatus;
use ascio\lib\Producer;
use ReflectionClass;
use ascio\lib\AscioOrderException;
use ascio\lib\AscioOrderExceptionV2;
use ascio\lib\SubmitOptions;
use ascio\lib\DomainBlocker;
use ascio\lib\LogLevel;
use ascio\lib\StatusSerializer;
use ascio\lib\TaskTrait;
use ascio\logic\BlockPayload;
use ascio\logic\OrderPayload;
use ascio\logic\v2\CallbackPayload;

class Order extends \ascio\service\v2\Order implements OrderInterface, OrderInfoInterface {       
    use TaskTrait;
    public $Messages = [];
    public $QueueItems = [];
    public $lastResult;
    public $objectName;
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
        $this->setPreviousId();
        $this->produce(["action"=>"create"]);
        if($this->submitOptions->getSubmitAfterQueue()) {
            $payload = new OrderPayload($this);
            $payload->setWorkflowStatus(OrderStatus::Queued);
            $payload->setOrder($this);
            $payload->send();
        }      
        return $this;
    }
    public function submit(?SubmitOptions $submitOptions=null) : OrderInfoInterface {        
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $domainName = $this->getDomain()->getDomainName();   
        $this->db()->_blocking = $this->submitOptions->getBlocking();
        if($this->shouldQueue()) {
            DomainBlocker::block($domainName);
            return $this->queue();
        } elseif(DomainBlocker::isBlocked($domainName)) {
            echo $this->getStatusSerializer()->console(LogLevel::Info,"Can't submit, queueing");
            $this->getSubmitOptions()->setSubmitAfterQueue(false);
            return $this->queue();
        } else {
            $this->setWorkflowStatus(OrderStatus::Submitting); 
            $this->produce();
            $payload = new BlockPayload($this); 
            $payload->send();
            DomainBlocker::block($domainName);              
            try {               
                if($this->submitOptions->getValidate()) {
                    $this->api()->getClient()->validateOrder($this);
                }                
                $result = $this->api()->getClient()->createOrder($this);
                $this->setWorkflowStatus(OrderStatus::Running);
                $order = $result->getOrder();                
                $this->lastResult = $result->getCreateOrderResult();
                $this->set($order);
                echo $this->getStatusSerializer()->console(LogLevel::Info,"Submitted");
                $this->produce(["action"=>"update"]);   
                $this->getSubmitOptions()->setQueue(true);
                return $order;
            } catch (AscioOrderExceptionV2 $e) {
                $this->setWorkflowStatus(OrderStatus::Completed); 
                $order = $e->getOrder();
                $this->lastResult = $e->status;
                $this->set($order);
                $this->db()->_message = $this->lastResult->getMessage();
                $this->db()->_code = $this->lastResult->getResultCode();
                $this->db()->_values = $this->lastResult->getValues();
                $this->produce(["action"=>"update"]);                
                throw $e; 
            }                                 
        }        
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
    public function setWorkflowStatus($status=null) : Order {
        if($status==null && Order::mapWorkflowStatus($this->getStatus())) {
            $this->db()->setAttribute("_status",Order::mapWorkflowStatus($this->getStatus()));
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
            "ObjectName" => $this->getDomain() ? $this->getDomain()->getDomainName() : "Missing object name"
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
    public function getObjectName() : ?string {
        return $this->getDomain()->getDomainName();
    }
    public function getObjectKey() : string {
        return "DomainName";
    } 
        /**
     * Set the value of PreviousId
     *
     * @return  self
     */ 
    public function setPreviousId() 
    {
        global $PREVIOUS_TASK_ID_V2, $PREVIOUS_OBJECT_NAME_V2;

        if(!$this->db()->getKey()) {
            return $this;
        }
        if($PREVIOUS_TASK_ID_V2 && $PREVIOUS_TASK_ID_V2 == $this->db()->getKey()) {
            return $this;
        }
        if($PREVIOUS_OBJECT_NAME_V2 && $PREVIOUS_OBJECT_NAME_V2 == $this->getObjectName()) {
            $this->db()->_previousId = $PREVIOUS_TASK_ID_V2;
        }
        $PREVIOUS_TASK_ID_V2 = $this->db()->getKey();
        $PREVIOUS_OBJECT_NAME_V2 = $this->getObjectName();
        return $this;
    } 
}