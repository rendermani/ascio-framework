<?php
namespace ascio\dns\importer;
use ascio\lib\AscioException;
use Exception;

trait ImporterExceptionTrait {
    protected $counter = 0; 
    protected $zone; 
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
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set the value of zone
     *
     * @return  self
     */ 
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }
}
