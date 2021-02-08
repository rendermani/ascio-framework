<?php
namespace ascio\lib;

use ascio\v3\CreateOrderResponse;
use ascio\v3\OrderInfo;

class AscioOrderExceptionV3 extends AscioOrderException {
        /**
     * Get the value of order
     */ 
    public function getOrder() : ?OrderInfo
    {
        return $this->order;
    }
    public function getErrors() {
        /**
         * @var CreateOrderResponse $status 
         */
        $status = $this->status;
        $values = $status->getErrors()->getString();
        $values = is_array($values) ? $values : [$values];
        return $values;         
    }
    public function formatErrors() {
        $br = php_sapi_name() == "cli" ? "\n" : "<br>";
        return  "[".$this->getCode()."] ".$this->getStatus()->getResultMessage().$br . 
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
    function getResult() : CreateOrderResponse
    {
        return $this->result;
    }
}