<?php
namespace ascio\lib;
use ascio\v2\Order;
use ascio\v2\Response;

class AscioOrderExceptionV2 extends AscioOrderException{
        /**
     * Get the value of order
     */ 
    public function getOrder() : Order
    {
        return $this->order;
    }

    public function getErrors() {
        /**
         * @var Response $status 
         */
        $status = $this->status;
        if (!$status->getValues()) return []; 
        $values = $status->getValues()->getString();
        $values = is_array($values) ? $values : [$values];
        return $values;         
    }
    public function formatErrors() {
        $br = php_sapi_name() == "cli" ? "\n" : "<br>";
        return  "[".$this->getCode()."] ".$this->getMessage().$br ;
        if($this->status->getValues()->toArray()) {
            implode($br,$this->status->getValues()->toArray()).$br;
        }
    }
    public function debug() {
        if(php_sapi_name() == "cli") {
            echo "Request\n";
            echo  $this->getCode() . "-" . $this->getMessage()."\n";
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