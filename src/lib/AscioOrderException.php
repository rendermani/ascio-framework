<?php
namespace ascio\lib;

class AscioOrderException extends AscioException {
    protected $order;
    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }     
    function setResult($method, $request, $status,$result) {
        $this->status = $status;
        $this->request = $request; 
        $this->method = $method; 
        $this->result = $result;
        $this->code = $status->getResultCode();
        $this->message = $this->formatErrors();
    }   
}