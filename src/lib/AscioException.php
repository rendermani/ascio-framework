<?php 
namespace ascio\lib;

use ascio\base\OrderInfoInterface;
use ascio\base\OrderInterface;
use ascio\v2\Order;
use ascio\v2\Response;
use ascio\v3\CreateOrderResponse;
use ascio\v3\OrderInfo;

class AscioException extends \Exception {
    public $values;
    public $request;
    public $method;
    public $soapRequest;
    public $soapResponse;
    public $result;
    public $status;

    function setResult($method, $request, $status,$result) {
        $this->status = $status;
        $this->request = $request; 
        $this->method = $method; 
        $this->result = $result;
        if(strpos(get_class($this->result),"v2")) {
            $this->code = $status->getResultCode();
            $this->message = $status->getMessage();            
        } else {
            $this->code = $status->getResultCode();
            $this->message = $status->getResultMessage();
        }


    }
    function setSoap($soapRequest,$soapResponse) {
        $this->soapRequest = $soapRequest;
        $this->soapResponse = $soapResponse;
    }
    public function debug() {
        if(php_sapi_name() == "cli") {
            echo "Error in ".$this->method."\n";
            echo "Request\n";
            var_dump($this->request);         
            echo "Status\n";
            var_dump($this->status);                  
        }
        else {
            echo "Error in ".$this->method."<br/>";
            echo "Request<br/>";
            echo print_r(nl2br($this->request),1);         
            echo "Status<br/>";
            echo print_r(nl2br($this->status),1);    
        }       
    }
    public function debugSoap() {
        if(php_sapi_name() == "cli") {
            echo "SOAP Request\n";
            echo $this->formatXml($this->soapRequest);
            echo "SOAP Response\n";
            echo $this->formatXml($this->soapResponse);            
        }
        else {
            echo "<h3>".$this->getCode() . "-" . $this->getMessage()."</h3>";
            echo "<h4>SOAP Request</h4>";
            echo "<pre>".print_r($this->request,1)."</pre>";
            echo "<h4>SOAP Response</h4>";
            echo "<pre>".print_r($this->values,1)."</pre>";
        }          
    }
    public function getResult() {
        return $this->result;
    }
    public function formatErrors() {
        return $this->getMessage();
    }
    public function formatXml($xml) {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xml);
        return $dom->saveXML();
    }
        /**
     * Get the value of request
     */ 
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set the value of request
     *
     * @return  self
     */ 
    public function setRequest($request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * Get the value of method
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @return  self
     */ 
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }
    /**
     * Get the value of status
     */ 
    public function getStatus()
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