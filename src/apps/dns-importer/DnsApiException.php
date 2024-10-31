<?php
namespace ascio\dns\importer;

use ascio\dns\Response;
use ascio\lib\AscioExceptionDns;
use Exception;

class DnsApiException extends AscioExceptionDns {
    use ImporterExceptionTrait;
    /**
     * @var Response
     */
    public $status;
    public function __toString() : string {
        if($this->status && $this->status->getValues()) {
            if(is_array($this->status->getValues()->getString())) {
                $messages = $this->status->getValues()->toArray();
                $error = implode(", \n",$messages) ."\n";
           } elseif ($this->status->getValues()->getString() !== null) {
               throw new Exception("this should no happen, please convert single value to array: ".$this->status->getValues()->getString()); 
                $error = $this->status->getValues()->getString() ."\n";
           }
        } else {
            $error = "";
        }
        $msg =  "[".$this->getCounter()."] Invalid Zone: ".$this->getZone()->getZoneName() ."\n";
        $msg .= $this->getCode() . " - ". $this->getMessage() . "\n";
        $msg .= $error;
        $msg = $msg."\n";                         
        return $msg;
    }
}