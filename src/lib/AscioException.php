<?php 
namespace ascio\lib;

use ascio\v2\Response;
 

class AscioException extends \Exception {
    public $values;
    public $request;
    public $method;
    public $soapRequest;
    public $soapResponse;
    public $result;

    function setResult($method, $request, $status,$result) {
        $this->status = $status;
        $this->request = $request; 
        $this->method = $method; 
        $this->result = $result;
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
            var_dump($this->soapRequest);
            echo "SOAP Response\n";
            var_dump($this->soapResponse);            
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
}
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
}

class AscioOrderExceptionV3 extends AscioOrderException{
    public function getErrors() {
        /**
         * @var Response $status 
         */
        $status = $this->status;
        $values = $status->getValues()->getString();
        $values = is_array($values) ? $values : [$values];
        return $values;         
    }
    public function formatErrors() {
        $br = php_sapi_name() == "cli" ? "\n" : "<br>";
        return  "[".$this->getCode()."] ".$this->getMessage().$br . 
        implode($br,$this->getErrors()).$br.$br;
    }
    public function debug() {
        if(php_sapi_name() == "cli") {
            echo "Request\n";
            echo  $this->getCode() . "-" . $this->getMessage()."\n";
            var_dump($this->request);
            echo "Errors\n";
        } else {
            echo "<h3>".$this->getCode() . "-" . $this->getMessage()."</h3>";
            echo "<h4>Request</h4>";
            echo "<pre>".print_r($this->request,1)."</pre>";
            echo "<h4>Errors</h4>";
        }   
        echo $this->formatErrors();       
    }
}
class AscioOrderExceptionV2 extends AscioOrderException{
    public function getErrors() {
        /**
         * @var Response $status 
         */
        $status = $this->status;
        $values = $status->getValues()->getString();
        $values = is_array($values) ? $values : [$values];
        return $values;         
    }
    public function formatErrors() {
        $br = php_sapi_name() == "cli" ? "\n" : "<br>";
        return  "[".$this->getCode()."] ".$this->getMessage().$br . 
        implode($br,$this->getErrors()).$br.$br;
    }
    public function debug() {
        if(php_sapi_name() == "cli") {
            echo "Request\n";
            echo  $this->getCode() . "-" . $this->getMessage()."\n";
            var_dump($this->request);
            echo "Errors\n";
        } else {
            echo "<h3>".$this->getCode() . "-" . $this->getMessage()."</h3>";
            echo "<h4>Request</h4>";
            echo "<pre>".print_r($this->request,1)."</pre>";
            echo "<h4>Errors</h4>";
        }   
        echo $this->formatErrors();       
    }
}
class AscioInfoException extends \Exception {
}


