<?php
namespace ascio\dns\importer;

use ascio\dns\Record;
use ascio\dns\SOA;
use ascio\dns\Zone;
use Hamcrest\SelfDescribing;

class ZoneDiff {
    protected $parsedZone;
    protected $apiZone;
    protected $added = [];
    protected $deleted = [];
    public function __construct(Zone $parsedZone, Zone $apiZone)
    {
        $this->parsedZone = $parsedZone;
        $this->apiZone = $apiZone;
    }
    public function getDeleted(callable $callback) : self {
        foreach($this->apiZone->getRecords() as $apiRecord) {
            // search for record in api
            $same = false;
            foreach($this->parsedZone->getRecords() as $parsedRecord) {
                $recordDiff = new RecordDiff($apiRecord,$parsedRecord,$this->apiZone);
                if($recordDiff->isSame()) {
                    $same = true;
                }
            }
            if(!$same) {
                $this->deleted[] = $recordDiff;
                $recordDiff->setParsedRecord(null);
                $callback($recordDiff);
            }
        }
        return $this;
    }
    public function getAdded(callable $callback) {
        foreach($this->parsedZone->getRecords() as $parsedRecord) {
            // search for record in api
            $same = false;
            if($parsedRecord instanceof SOA) {
                return;
            }
            foreach($this->apiZone->getRecords() as $apiRecord) {
                $recordDiff = new RecordDiff($parsedRecord,$apiRecord,$this->parsedZone);
                if($recordDiff->isSame()) {
                    $same = true;
                }
            }
            if(!$same) {
                $this->added[] = $recordDiff;
                $recordDiff->setApiRecord(null);                
                $callback($recordDiff);
            }
        }
        return $this;
    }       
}
class RecordDiff {
    protected $parsedRecord;
    protected $apiRecord;
    protected $diffProperties = []; 
    protected $type = "same";
    public function __construct(Record $parsedRecord, Record $apiRecord, Zone $zone)
    {
        $this->parsedRecord = $parsedRecord;
        $this->parsedRecord->setSource(str_replace("@",$zone->getZonename(),$this->parsedRecord->getSource()));
        $this->apiRecord = $apiRecord;
        $this->calc();
    }
    protected function calc() {
        if(get_class($this->parsedRecord) !== get_class($this->apiRecord)) {
            $this->type = "update";
            return; 
        }
        foreach($this->parsedRecord->properties() as $key => $value) {
            $diff = new PropertiesDiff($key,$value, $this->apiRecord->get($key) );            
            if(!$diff->isSame()) {
                $this->diffProperties[$key] = $diff; 
                $this->type = "update";
            }
        }
        return count($this->diffProperties) > 0; 
    }
    public function isSame() {
        return $this->type == "same";
    }
    /**
     * Get the value of type
     */ 
    public function getType() : string
    {
        return $this->type;
    }
        /**
     * Get the value of parsedRecord
     */ 
    public function getParsedRecord() : Record
    {
        return $this->parsedRecord;
    }
     /**
     * Set the value of parsedRecord
     *
     * @return  self
     */ 
    public function setParsedRecord(?Record $parsedRecord)
    {
        $this->parsedRecord = $parsedRecord;

        return $this;
    }
    /**
     * Get the value of apiRecord
     */ 
    public function getApiRecord() : Record
    {
        return $this->apiRecord;
    }
    /**
     * Set the value of apiRecord
     *
     * @return  self
     */ 
    public function setApiRecord(?Record $apiRecord)
    {
        $this->apiRecord = $apiRecord;

        return $this;
    }
}
class PropertiesDiff {
    protected $key;
    protected $parsedValue;
    protected $apiValue;
    protected $type;
    public function __construct(string $key, $parsedValue, $apiValue)
    {
        $this->key = $key;
        $this->parsedValue = $parsedValue;
        $this->apiValue = $apiValue;

        if(
            $parsedValue instanceof \DateTime ||
            in_array($key,["UpdatedDate","Serial","Id"])
        ) {
            $this->type = "same";
        } elseif($parsedValue == $apiValue) {
           $this->type = "same";
        } elseif(!$this->apiValue) {
           $this->type = "add";
        } elseif(!$this->parsedValue) {
           $this->type = "delete";
        } else {
           $this->type = "update";
        }
    }   
    public function isSame() {
        return $this->getType() == "same";
    }
    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the value of parsedValue
     */ 
    public function getParsedValue()
    {
        return $this->parsedValue;
    }

    /**
     * Get the value of apiValue
     */ 
    public function getApiValue()
    {
        return $this->apiValue;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }



}
