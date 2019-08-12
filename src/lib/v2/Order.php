<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\v2;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use ascio\lib\OrderStatus;
use ascio\lib\Producer;
use ReflectionClass;
use ascio\lib\AscioOrderException;
use ascio\lib\SubmitOptions;
use ascio\service\v2\Domain;
use ascio\lib\DomainBlocker;

class Order extends \ascio\service\v2\Order {       
    public $lastResult;
    /**
     * @var SubmitOptions $submitOptions
     */
    private $submitOptions; 
    public function queue(?SubmitOptions $submitOptions=null) : Order{
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $this->setWorkflowStatus(OrderStatus::Queued); 
        $this->produce(["action"=>"create"]);
        //immediately pickup order with the order-queue and submit it
        //if an order is running, the order-queue won't submit. However it's unnecessary network traffic and better to 
        //only submit the first order. The others will be processed after the first is completed 
        if($this->submitOptions->getSubmitAfterQueue()) {
            Producer::callback($this,[
                "OrderStatus"=> OrderStatus::Queued,
                "DomainName"=> $this->getDomain()->getDomainName()
            ]);
        }        
        return $this;
    }
    public function submit(?SubmitOptions $submitOptions=null) : Order {        
        $this->submitOptions = $submitOptions ?: $this->getSubmitOptions();
        $domainName = $this->getDomain()->getDomainName();
        //todo: add DomainBlocker::syncFromDb      
        $this->db()->_blocking = $this->submitOptions->getBlocking();
        if(DomainBlocker::isBlocked($domainName) || $this->shouldQueue()) {
            return $this->queue();
        } else {
            $this->setWorkflowStatus(OrderStatus::Submitting); 
            Producer::callback($this,[
                "OrderStatus"=> OrderStatus::Submitting,
                "DomainName"=> $domainName
            ]);            
            $this->produce(["action"=>"create"]);
            try {
                DomainBlocker::block($domainName);
                $result = $this->api()->getClient()->createOrder($this);
                $this->setWorkflowStatus(OrderStatus::Running);
                $order = $result->getOrder();
                $this->lastResult = $result->getCreateOrderResult();
                $this->set($order);
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
    public function shouldQueue() : bool {
        return $this->getSubmitOptions()->getQueue() || $this->db()->shouldQueue();           
    }
    public static function mapWorflowStatus($status) {
        switch($status) {
            case OrderStatusType::Completed :
            case OrderStatusType::Failed    :
            case OrderStatusType::Invalid   : return OrderStatus::Completed;
            case OrderStatus::Queued    : return OrderStatus::Queued;
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
    public function getWorkflowStatus() : string {
        return $this->db()->_status;        
    }
    public function getSubmitOptions() : SubmitOptions {
        return $this->submitOptions ?: new SubmitOptions();
    }
    public function setSubmitOptions(SubmitOptions $submitOptions) : Order  {
        $this->submitOptions = $submitOptions;
        return $this; 
    }
    public function getResult() {
        return $this->lastResult;
    }
    public function validate() : Response {
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
    public function syncApi() : Order {        
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
    public function getMessages() : ?ArrayOfMessage{
        $this->api()->getClient()->getMessages($this->getOrderId()); 
    }
    protected function processNext() : Order {
        $order = new Order();
        $domainName = $this->getDomain()->getDomainName();
        try {
            $orderData = $order->db()->next($domainName); 
            if(!$order->db()->isBlocked()) {
                $order->set($orderData);
                $order->submit();
            } else {
                return $this; 
            }            
        } catch (ModelNotFoundException $e) {
        
        }       
        return $this; 
    }
}