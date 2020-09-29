<?php
namespace ascio\logic;
use ascio\base\BaseClass;
use ascio\base\DbBase;
use ascio\base\DbModelBase;
use ascio\base\OrderInfoInterface;
use ascio\lib\AscioException;
use ascio\v2\Domain;
use ascio\v2\Order;
use ascio\v2\QueueItem;
use ascio\lib\Actions;
use ascio\lib\Ascio;
use ascio\lib\Producer;
use ascio\lib\TopicProducer;
use Illuminate\Support\Str;
use JsonSerializable;


class Payload  {
    public $action; 
    public $blocking; 
    public $id; 
    public $status; 
    public $workflowStatus; 
    public $objectType;
    public $class; 
    public $object;
    public $error; 
    public $incremental; 
    public $changes; 
    public $objectName;
    public $module;
    public $config;
    public $api;
    public $parameters = []; 


    //OPTIMIZE: Remove changes
    public function __construct($payloadObj=null)
    {
        /* if($payloadObj) foreach($payloadObj as $key => $value) {
            $camelCaseKey = Str::camel($key);
            $this->$camelCaseKey = $value; 
        } */
        $this->class = get_class($this);
        if($payloadObj) {                        
            $this->api = explode("\\",get_class($payloadObj))[1];            
            $this->config = Ascio::getConfig()->getId();
            $this->setObject($payloadObj);
        }
        if($payloadObj instanceof BaseClass) {
            $this->api = explode("\\",get_class($payloadObj))[1];
        }
        if($payloadObj instanceof DbBase) {
            if(!$payloadObj->db()->getKey()) {
                $payloadObj->db()->createDbProperties();
            }
            $this->id = $payloadObj->db()->getKey(); 
        }
        if($payloadObj instanceof OrderInfoInterface) {
            $this->workflowStatus = $payloadObj->getWorkflowStatus();
            $this->status = $payloadObj->getStatus();
        }
        $this->setApiVersion();
        
    }
    public function setApiVersion() {
        if($this->getObject() && strpos(get_class($this->getObject()),"v2") !== false ) {
            $this->setApi("v2");
        } else {
            $this->setApi("v3");
        }
    }
    public function serialize() {
        $clonePayload = clone $this; 
        if($this->getObject()) {
            $clonePayload->object = $this->getObject()->serialize();
        }
        return $clonePayload; 
    }
    public function deserialize($payload) {
        foreach($payload as $key => $value) {
            if($value && is_object($value) && property_exists($value,"DbAttributes")) {
                $className = new $value->DbAttributes->_type;
                $obj = new $className();
                $value= $obj->deserialize($value);
                //OPTIMIZE: Remove changes
                if($key == "object") {
                    $this->changes = $value;    
                }
            } 
            $this->$key = $value; 
        }
        $this->parameters = (array) $payload->parameters;
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
     * Get the detailed Status
     */ 
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Set the value of module
     *
     * @return  self
     */ 
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }
    public function getObject() {
        return $this->object;
    }

    /**
     * Set the value of object
     *
     * @return  self
     */ 
    public function setObject($object)
    {
        $this->object = $object;
        $this->objectType = get_class($object);
        return $this;
    }



    /**
     * Get the value of ObjectName
     */ 
    public function getObjectName()
    {
        return $this->object->getObjectName();
    }
    /**
     * Set the value of ObjectName
     */ 
    public function setObjectName($name)
    {
        return $this->objectName = $name;
    }
    /**
     * Get the value of Module
     */ 
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Get the value of Config
     */ 
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Get the value of objectType
     */ 
    public function getObjectType()
    {
        return  get_class($this->object);
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
    public function jsonSerialize()
    {
        $serialized = clone $this;
        $serialized->setObject($this->getObject()->serialize());
        return $serialized;
    }

    /**
     * Get the value of api
     */ 
    public function getApi()
    {
        return $this->api;
    }

    /**
     * Set the value of api
     *
     * @return  self
     */ 
    public function setApi($api)
    {
        $this->api = $api;

        return $this;
    }
    public function send() {
        assert($this->class,"Has a class");
        TopicProducer::send("callback",$this); 
    }

    /**
     * Get the value of parameters
     */ 
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set the value of parameters
     *
     * @return  self
     */ 
    public function setParameters($parameters)
    {
        $this->parameters = (array) $parameters;

        return $this;
    }

    /**
     * Get the value of class
     */ 
    public function getClass()
    {
        return $this->class;
    }
}
