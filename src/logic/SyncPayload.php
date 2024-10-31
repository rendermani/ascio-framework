<?php
namespace ascio\logic;

use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\lib\Producer;
use phpDocumentor\Reflection\Types\Boolean;

class SyncPayload  extends Payload {  
    public $changes;
    public $incremental;
    public $id;
    public function serialize() {
        $clonePayload = clone $this; 
        if ($this->isUpdate()) {
            $clonePayload->object = $this->getObject()->serializeIncremental();
        } else {
            $clonePayload->object = $this->getObject()->serialize();
        }
        return $clonePayload; 
    }

     /**
     * Get the value of incremental
     */ 
    public function getIncremental()
    {
        return $this->incremental;
    }

    /**
     * Set the value of incremental
     *
     * @return  self
     */ 
    public function setIncremental($incremental)
    {
        $this->incremental = $incremental;

        return $this;
    }
    /**
     * Get the value of changes
     */ 
    public function getChanges()
    {
        return $this->changes;
    }

    /**
     * Set the value of changes
     *
     * @return  self
     */ 
    public function setChanges($changes)
    {
        $this->changes = $changes;

        return $this;
    }
    public function getObject() : ?DbBase {
        return  $this->object;
    }
    public function setUpdate(bool $isUpdate  = null) : self {
        $this->parameters["action"] =  $isUpdate ? "update" : "create";
        $this->setAction($this->parameters["action"]);
        $this->incremental = $isUpdate ? true  : false;
        return $this; 
    }
    public function isUpdate() : bool {
        return array_key_exists("action",$this->parameters) && $this->parameters["action"] == "update" ? true : false;
    }
    public function send($parameters  = []) {
        assert($this->getId()!==null,"Object has an ID"); 
        assert($this->getObject() instanceof DbBase,"Object should be an instance of DbBase"); 
        assert($this->getClass() !== false,"Has a class");
        assert($this->getObjectType() !== false,"Has an objectType");
        $this->setParameters(array_merge($parameters,$this->parameters));        
        Producer::object($this);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        if(!$this->getObject()->db()->getKey()) $this->getObject()->db()->createDbProperties();
        return $this->getObject()->db()->getKey();
    }
}
