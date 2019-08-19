<?php
namespace ascio\lib;

class SubmitOptions {
    public $blocking=false; 
    public $queue=false;
    public $submit=true; 
    public $autoUnlock=false; 
    public $workflow; 

    /**
     * Get the value of blocking
     */ 
    public function getBlocking()
    {
        return $this->blocking;
    }

    /**
     * Set the value of blocking
     *
     * @return  self
     */ 
    public function setBlocking(bool $blocking) : SubmitOptions
    {
        $this->blocking = $blocking;
        $this->workflow = uniqid("wf");
        return $this;
    }

    /**
     * Get the boolean value of queue
     * If true the order is sent into the queue, instead of sending it directly to the API
     * This is faster, however there is no synchronous result at all
     * It's recommended to validate the order before submitting into the queue, if possible. 
     * @return  bool
     */ 
    public function getQueue() : bool
    {
        return $this->queue;
    }

    /**
     * Set the boolean value of queue
     * If true the order is sent into the queue, instead of sending it directly to the API
     * This is faster, however there is no synchronous result at all
     * It's recommended to validate the order before submitting into the queue, if possible. 
     * @return  self
     */ 
    public function setQueue(bool $queue) : SubmitOptions
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get the value of autoUnlock
     */ 
    public function getAutoUnlock() : bool
    {
        return $this->autoUnlock;
    }

    /**
     * Set the value of autoUnlock
     *
     * @return  self
     */ 
    public function setAutoUnlock(bool $autoUnlock) : SubmitOptions
    {
        $this->autoUnlock = $autoUnlock;

        return $this;
    }

    /**
     * Get the value of workflow
     */ 
    public function getWorkflow()
    {
        return $this->workflow;
    }

    /**
     * Set the value of workflow
     *
     * @return  self
     */ 
    public function setWorkflow($workflow) : SubmitOptions
    {
        $this->workflow = $workflow;

        return $this;
    }

    /**
     *   Get the boolean value of submitAfterQueue. 
     *   Immediately pickup order with the order-queue and submit it.
     *   If an order is running, the order-queue won't submit. However it's unnecessary network traffic and better to 
     *   only submit the first order. The others will be processed after the first is completed
     *   @return bool;
     */ 
    public function getSubmitAfterQueue()
    {
        return $this->submit;
    }

    /**
     *   Set the boolean value of submitAfterQueue. 
     *   Immediately pickup order with the order-queue and submit it.
     *   If an order is running, the order-queue won't submit. However it's unnecessary network traffic and better to 
     *   only submit the first order. The others will be processed after the first is completed
     * 
     */ 
    public function setSubmitAfterQueue($submit)
    {
        $this->submit = $submit;

        return $this;
    }
}