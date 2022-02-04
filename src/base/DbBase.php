<?php

namespace ascio\base;

use ascio\lib\AscioException;
use ascio\lib\Changes;
use ascio\lib\Handle;
use ascio\lib\StatusSerializer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Model;

abstract class DbBase extends BaseClass {
    protected $handle; 
    /**
     * @var DbModelBase $_db;
     */
    protected $_db;
    /**
     * @var ApiModelBase $_api;
     */
    protected $_api;    
    protected $_id;
    public function get($name=null,$class=null) {
        if (!parent::_get($name)) {
            if($class && $this->objects()->exists($name)) {
                $obj = new $class();
                if($obj instanceof DbArrayBase) {
                    $obj->parent($this);
                    $array = $obj->db()->{"get".$obj->getArrayKey()}();
                    $this->_set($name, $array);
                    return $obj;
                }  elseif ($obj instanceof DbBase) {
                    $obj->parent($this);
                    $relation = $this->db()->{"get".$name}();
                    $this->_set($name, $relation);  
                 }                                
            }
            return null;
        } elseif(!$name) {
            return $this->properties()->toArray();
        } elseif (is_object(parent::_get($name))) {
            return parent::_get($name);
        } elseif ($this->objects()->exists($name) && method_exists($this->db(),"get".$name)) {
             $result = $this->db()->{"get".$name}();
             return $result; 
        } elseif ($this->objects()->exists($name) ) {
            $result = json_decode(parent::get($name));
            return $result; 
       } else {
            return parent::get($name);
        }                        
    }
    /**
     * Set a property. If a no $value is provided objects/arrays are merged.  
     * @param BaseClass|string|array $nameOrArray merge values from BaseClass or array. If string, a $value must be provided
     * @param BaseClass|string|array|null $value Any value. $nameOrArray must be string
     * @return BaseClass
     */
    function set($nameOrArray,$value=null) {
        if($value) {
            if(!$this->properties()->exists($nameOrArray)) {
                return;
            } 
            // value is a JSON-Array
            if($value instanceOf ArrayBase) {
                $this->db()->$nameOrArray = $value->toJson();
            } 
            // Value is other BaseClass
            if( ($value instanceOf BaseClass) ) {
                $value->parent($this);
            } 
            // Value is other BaseClass
            if(!is_object($value)) {
                $this->db()->setAttribute($nameOrArray,$value);
            } 
            if($this->objects()->exists($nameOrArray)){
                if(is_string($value)) {
                    $decoded = json_decode($value);
                    if($decoded) {
                        $newObject = $this->createProperty($nameOrArray);
                        $value = $newObject->deserialize(json_decode($value));                    
                    }
                    else {

                    }            
                }
            }
            $this->_set($nameOrArray,$value);
        } 
    // set $this properties
        else {            
            // from other object with the same class. Don't overwrite DB-Properties. For API-Results
            if(($nameOrArray instanceof BaseClass)) {            
                parent::merge($nameOrArray);                
            } // convert from array
            elseif ($nameOrArray instanceOf Model) {
                foreach($nameOrArray->getAttributes() as $key => $value) {
                    $this->set($key,$value);
                }
                $this->db($nameOrArray);
            }
            elseif (is_array($nameOrArray) ||is_object($nameOrArray)) {
                foreach($nameOrArray as $key => $value) {
                    $this->set($key,$value);
                }
            } else {
                // for DB results
                $this->_set($nameOrArray,$value);                
            }
        }        
    return $this; 
}
    public function getByHandle($handle) : DbBase {
        $this->handle($handle);
        try {
            $result = $this->db()->getByHandle();        
        } catch(ModelNotFoundException $e) {
            $this->api()->get();  
        }
        $this->changes()->setOriginal();        
        return $this; 
    }
    public function getById($id) : DbBase {
        $this->db()->getById($id);
        return $this; 
    }
    public function serialize() : Object {
        $this->db()->createDbProperties();
        return $this->properties()->cleanObject();
    }
    public function serializeIncremental() : Object {
        $this->db()->createDbProperties();
        return $this->properties()->cleanObject(true);
    }
    /**
     * @return DbModelBase
     */
    public function db($db=null)  {
        if($db) {
            $this->_db = $db;
            $this->_db->parent($this);
        }
        return $this->_db; 
    }
    public function handle($value=null) : Handle {
        return new Handle($this,$value);
    }
    public function sync($handle=null) {
        $name = (new \ReflectionClass($this))->getShortName();
        $action = "none";
        // does the client support the get method? 
        if(method_exists($this->api()->getClient(),"get".$name)) {
            $handle = $handle ?: $this->handle()->getValue(); 
            if(!$handle) return;
            $this->handle($handle);            
            try {
                $this->db()->getByHandle(); 
                $action = "update";
            } catch (ModelNotFoundException $e) {
                $this->db()->_part_of_order = $this->parent() instanceof OrderInterface; 
                $action = "create";
            }
            try {
                $this->api()->get();  
                $this->produce(["action" => $action]);          
            } catch(AscioException $e) {
                echo $e->getMessage()."\n";
            }
        }
        return $action;        
    } 
    public function api($api=null) : ?ApiModelBase {
        return null;
    }
    public function getStatusSerializer() : StatusSerializer
    {
        $handle = $this->handle()->exists() ? [$this->handle()->getKey() => $this->handle()->getValue()] : [];
        $this->_statusSerializer->setFields($handle);
        return $this->_statusSerializer;
    }
    /**
     * Serialize the object and send it to Kafka. 
     */
    public function produce ($parameters=[]) {
        if(! array_key_exists("action",$parameters)) {
            $parameters["action"] = $this->db()->_id ? "update" : "create"; 
        }       
-        parent::produce($parameters);
    }
    public function create($property,$class) {
        $this->$property = new $class($this);
        $this->$property->parent($this); 
        $this->$property->changes()->setOriginal();        
        return $this->$property;
    }
    public function log($loglevel, $text="", $fields=[]) {
        return $this->getStatusSerializer()->addFields($fields)->console($loglevel,$text);
    }

    /**
     * Get the value of handle
     */ 
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Set the value of handle
     *
     * @return  self
     */ 
    public function setHandle($handle)
    {
        $this->handle = $handle;

        return $this;
    }
}