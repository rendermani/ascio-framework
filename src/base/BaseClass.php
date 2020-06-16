<?php

namespace ascio\base;

use ascio\lib\ApiProperties;
use ascio\lib\Ascio;
use ascio\lib\Substitutions;
use ascio\base\ArrayBase;
use ascio\lib\Changes;
use ascio\lib\ApiArrayProperties;
use ascio\lib\Producer;
use Illuminate\Database\Eloquent\Model;
use ReflectionMethod;
use ascio\base\DbBase;
use ascio\lib\StatusSerializer;
use ascio\logic\SyncPayload;
use DateTime;
use DateTimeZone;
use Exception;

class BaseClass {
    protected $_properties;
    protected $_objects;
    protected $_apiProperties = [];
    protected $_apiObjects = [];
    private $_position = 0;
    protected $_parent;
    private $_substitutionsObject;
    private $_substituted=[];
    protected $_substitutions=[];
    protected $_db;
    protected $_api;
    protected $_config;
    /**
     * @var StatusSerializer $_statusSerializer
     */
    protected $_statusSerializer; 
    public function __construct($parent=null) {
        $this->_parent = $parent;
        $this->_position = 0;
        $this->_properties = new ApiProperties($this,$this->_apiProperties);
        $this->_objects = new ApiProperties($this,$this->_apiObjects);
        if($this->_substitutions) {
            $this->_substitutionsObject = new Substitutions($this,$this->_substitutions,$this->_substituted);
        }
        $this->_statusSerializer = new StatusSerializer($this);
    }
    /**
     * Recursive __construct().
     * When getting Objects from the SOAP-Client no _construct is called. Workaround. 
     */
    public function init($parent=null) {
        $this->__construct($parent);
        foreach($this->objects() as  $childObject) {
            if(is_array($childObject)) {
                foreach($childObject as $item)  {
                    $item->init($parent);
                }
            } elseif($childObject instanceOf ArrayInterface) {
                $childObject->__construct($this);
                foreach($childObject as $item)  {
                    if(is_object($item)) $item->init($childObject);
                }
            } elseif ($childObject instanceOf BaseClass) {
                $childObject->init($this);
            }
        }  
        return $this;      
    }
    /**
     * Get a property. If no name is provided all properties are returned
     * @param string $name name of the property 
     */
    function get($name=null) {
        if(!$name) {
            $out = [];
            foreach($this->properties() as $key) {
                $out[$key] = $this->get($key);
            }
            return $out;
        } elseif($this->_get($name)) {
            $returnType = (new ReflectionMethod($this,"get".$name))->getReturnType(); 
            if(!$returnType) {
                return $this->_get($name);
            }
            // todo: check this. works now and didn't work before. Prevent double encoding. 
            switch ($returnType) {
                case "DateTime" : 
                    if(! ($this->_get($name) instanceof DateTime)) {
                        if(strpos($this->_get($name),".")===false) {
                            $this->_set($name,$this->_get($name).".0000"); 
                        }
                        $this->_set($name,\DateTime::createFromFormat('Y-m-d?H:i:s.u', $this->_get($name)));break;
                    }
            }
            return $this->_get($name);
        }        
    }
    public function _get($name) {
        return $this->$name;
    }
    /**
     * Set a property. If a no $value is provided objects/arrays are merged.  
     * @param BaseClass|string|array $nameOrArray merge values from BaseClass or array. If string, a $value must be provided
     * @param BaseClass|string|array|null $value Any value. $nameOrArray must be string
     * @return BaseClass
     */
    function set($nameOrArray,$value=null) {
        // set sub-property
        if($value) {
            // property not an API property                       
            /**if($this instanceof DbBase) {
                if(!(is_object($value) || is_array($value))) {
                    $this->db()->setAttribute($nameOrArray,$value);
                }                
            }**/
            if(!$this->properties()->exists($nameOrArray)) {
                return;
            } 
            // value is a JSON-Array
            if(($value instanceOf ArrayBase) && ($this instanceof DbBase)) {
                $this->db()->$nameOrArray = $value->toJson();
            } 
            // Value is other BaseClass
            if( ($value instanceOf BaseClass) ) {
                $value->parent($this);
            } 
            // Value is other BaseClass
            if(($this instanceOf DbBase) &&! is_object($value)) {
                $this->db()->setAttribute($nameOrArray,$value);
            } 

            $this->_set($nameOrArray,$value);
        } 
        // set $this properties
        else {            
            // from other object with the same class. Don't overwrite DB-Properties. For API-Results
            if(($nameOrArray instanceof BaseClass)) {            
                $this->merge($nameOrArray);                
            } // convert from array
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
    protected function merge(BaseClass $source) : BaseClass {
        if(get_class($this) !== get_class($source)) {
            throw new \Exception('$this ('.get_class($this).') and $source ('.get_class($source).') must have the same class');
        }
        foreach ($source->properties() as $key => $value) {                                                
            if(($value instanceof ArrayBase) || ($value instanceof DbArrayBase)) {
                $class = get_class($value);
                $newValue = new $class($this);                              
                foreach ($value as $itemValue) {
                    $newValue->push($itemValue);
                }                
            } elseif ($value instanceof BaseClass) {                
                $class = get_class($value);
                $newValue = $this->get($key) ? $this->get($key) : new $class($this); 
                $this->_set($key,$newValue->merge($value));
            } else {
                $newValue = $value; 
            }
            $this->_set($key,$newValue);
        }
        return $this;
    }
    public function clone()
    {
        $class = get_class($this);
        $newObject = new $class($this->parent());
        if($this instanceof ArrayInterface) {
            foreach ($this as $key => $value) {          
                if($value instanceof BaseClass) {
                    $newObject->push($value->clone());
                    $value->parent($newObject);
                } else {
                    $newObject->push($value);
                }                              
            }
        } else {
            foreach ($this->properties() as $key => $value) {
                if($value instanceof BaseClass) {
                    $newValue =  $value->clone(); 
                    $newValue->parent($newObject);
                    $newObject->_set($key,$newValue);
                } else {                   
                    $newObject->_set($key,$value);
                }
            }
        }
        return $newObject;

    }
    public function _set($name,$value) {
        $this->$name = $value;
        return $this;
    }
    public function create($property,$class) {
        $this->$property = new $class($this);
        $this->$property->parent($this);      
        return $this->$property;
    }
    public function createProperty($property) : BaseClass {
        $prop = $this->{"create".$property}();
        $prop->parent($this);
        return $prop;
    }
    public function objects() : ApiProperties  {
        return $this->_objects;
    }       
    public function properties() : ApiProperties {
        return $this->_properties;
    } 
    public function parent(?BaseClass $parent=null) {
        if(!$parent) {
            return $this->_parent; 
        }
        $this->_parent = $parent;
        return $parent; 
    }
    public function config()  {
        return Ascio::getConfig()->get();
    }

    public function substitutions() {
        return $this->_substitutionsObject;
    }
    public function hasApi() {
        return method_exists($this,"api");
    }
    public function toJson() {
        return $this->properties()->toJson();
    }
    /**
     * Serialize the object and send it to Kafka. 
     */
    public function produce ($parameters=[]) {
        $payload = new SyncPayload($this);
        $payload->send($parameters);
    }
    public function getStatusSerializer() : StatusSerializer
    {
        return $this->_statusSerializer;
    }
    public function serialize() : Object {
        return $this->properties()->cleanObject();
    }
    public function deserialize($obj) : self {
        foreach((array )$obj as $key => $value) {
            if(is_object($value) && property_exists($value,"timezone_type")) {
                $format = 'Y-m-d H:i:s.u';
                $date = DateTime::createFromFormat($format, $value->date);
                $date->setTimezone(new DateTimeZone($value->timezone));
                $this->set($key,$date);
            } elseif(is_object($value)) {
               if($this->objects()->exists($key)) {
                    /**
                     * @var DbClass $newObj
                     */
                    $newObj = $this->get($key) ?: $this->createProperty($key);
                    if(is_string($newObj)) {
                        throw new Exception($key ." should be an object. String found: ".$newObj);
                    }
                    $newObj->deserialize($value);
               } elseif($key =="DbAttributes") {                    
                foreach($value as $k => $v) {
                        $this->db()->setAttribute($k,$v);
                    } 
               }
            } elseif(is_array($value)) {
                /**
                 * @var DbArrayBase $arr
                 */
                $arr = $this;
                if($this->objects()->exists($key)) {
                    foreach($value as $v) {                        
                        $arr->createItem($v);
                    }                    
                } 
            } else {
                $this->set($key,$value);
            }
        }
        return $this;         
    }
}