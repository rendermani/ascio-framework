<?php
namespace ascio\logic;
use ascio\base\BaseClass;
use ascio\base\DbModelBase;
use ascio\lib\AscioException;
use ascio\v2\Domain;
use ascio\v2\Order;
use ascio\v2\QueueItem;
use ascio\lib\Actions;

class Payload {
    public $action; 
    public $blocking; 
    public $orderId; 
    public $id; 
    public $domainName; 
    public $workflowStatus; 
    public $processStatus;
    public $class;
    public $dbClass;
    public $domain;
    public $queueItem;
    public $object;
    public $order;
    public $error; 
    public $incremental; 
    public $changes; 
    public $module;
    //OPTIMIZE: Remove changes
    public function __construct($payloadObj)
    {
        //todo: merge; 
    }
    public function serialize($payload) {
        $serialized = [];
        foreach($payload as $key => $value) {
            if($value instanceof BaseClass) {
                $serialized->$key = $value->properties()->serialize();
            } else {
                $serialized->$key = $value; 
            }
        }
        return $serialized; 
    }
    public function deserialize($payload) {
        foreach($payload as $key => $value) {
            if(property_exists($value,"DbAttributes")) {
                $className = new $value->DbAttributes->className;
                $obj = new $className();
                $value= $obj->deserialize($value);
                //OPTIMIZE: Remove changes
                if($key == "object") {
                    $this->changes = $value;    
                }
            } 
            $this->$key = $value; 
        }
    }
    /**
     * Get the value of action
     */ 
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the value of action
     *
     * @return  self
     */ 
    public function setAction(string $action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get the value of blocking
     */ 
    public function getBlocking() : bool
    {
        return $this->blocking;
    }

    /**
     * Set the value of blocking
     *
     * @return  self
     */ 
    public function setBlocking(bool $blocking)
    {
        $this->blocking = $blocking;

        return $this;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    /**
     * Get the value of workflowStatus
     */ 
    public function getWorkflowStatus()
    {
        return $this->workflowStatus;
    }

    /**
     * Set the value of workflowStatus
     *
     * @return  self
     */ 
    public function setWorkflowStatus($workflowStatus)
    {
        $this->workflowStatus = $workflowStatus;

        return $this;
    }
    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */ 
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of dbClass
     */ 
    public function getDbClass() : ?DbModelBase
    {
        return $this->dbClass;
    }

    /**
     * Set the value of dbClass
     *
     * @return  self
     */ 
    public function setDbClass(DbModelBase $dbClass)
    {
        $this->dbClass = $dbClass;

        return $this;
    }
    /**
     * Get the value of error
     */ 
    public function getError() : ?AscioException
    {
        return $this->error;
    }

    /**
     * Set the value of error
     *
     * @return  self
     */ 
    public function setError(AscioException $error)
    {
        $this->error = $error;

        return $this;
    }
    /**
     * Get the value of module
     */ 
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set the value of module
     *
     * @return  self
     */ 
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }
    public function getObject() : ?BaseClass {
        return null;
    }
}
