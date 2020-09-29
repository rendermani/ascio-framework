<?php
namespace ascio\dns\importer;
use Exception;

class ZoneParseException extends Exception {
    use ImporterExceptionTrait;
    protected $zoneDef; 
    public function __toString() : string
    {
        if(isset($this->zone)) {
            return  "[".$this->getCounter()."] Invalid Record Definition: ".$this->getZone()->getZoneName()."\n" . $this->getMessage() . "\n".$this->zoneDef."\n\n";
        } else {
            return  "[".$this->getCounter()."] Invalid Zone Definition: ". $this->getMessage() . "\n".$this->zoneDef."\n\n";
        }
    }    
    /**
     * Set the raw text data of the zone
     *
     * @return  self
     */ 
    public function setZoneDef($zoneDef)
    {
        $this->zoneDef = $zoneDef;
        return $this;
    }
}