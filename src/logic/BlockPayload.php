<?php
namespace ascio\logic;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\lib\OrderStatus;
use ascio\lib\TopicProducer;

class BlockPayload extends CallbackPayload {
    /**
     * @var OrderInterface $order 
     */
    public $workflowStatus;

    public function __construct(OrderInterface $order = null)
    {      
       $this->class = get_class($this);
       if ($order) {
           $this->setObjectName($order->getObjectName());
       }
       $this->setModule("DomainBlocker");
    }
    public function send() {
        TopicProducer::send("callback",$this); 
    }
}
