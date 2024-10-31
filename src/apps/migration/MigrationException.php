<?php
namespace ascio\migration;

use Exception;

class MigrationException extends Exception {
    protected $counter = 0; 
    protected $domainName; 
    public function __toString() : string
    {
        if(isset($this->domainName)) {
            return  "[".$this->getCounter()."] Invalid Domain Definition: ".$this->getDomainName()."\n" . $this->getMessage() ."\n";
        } else {
            return  "[".$this->getCounter()."] Can't parse Domain : ". $this->getMessage() . "\n";
        }
    }
    public function setCounter(int $counter) : self {
        $this->counter = $counter; 
        return $this;
    }
    /**
     * Get the value of counter
     */ 
    public function getCounter() : int
    {
        return $this->counter;
    }
        /**
     * Get the value of zone
     */ 

    /**
     * Get the value of domainName
     */ 
    public function getDomainName()
    {
        return $this->domainName;
    }

    /**
     * Set the value of domainName
     *
     * @return  self
     */ 
    public function setDomainName($domainName)
    {
        $this->domainName = $domainName;

        return $this;
    }
}