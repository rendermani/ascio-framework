<?php

namespace ascio\base;

use ascio\lib\ApiProperties;
use ascio\lib\Ascio;
use ascio\lib\Substitutions;
use ascio\base\ArrayBase;
use ascio\lib\Changes;

use ascio\lib\Producer;
use Illuminate\Database\Eloquent\Model;
use ReflectionMethod;
use ascio\base\DbBase;
use ascio\lib\StatusSerializer;
use ascio\logic\SyncPayload;
use DateTime;
use DateTimeZone;
use Exception;
use ReflectionClass;
use stdClass;

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
    protected $_changes;
    /**
     * @var StatusSerializer $_statusSerializer
     */
    protected $_statusSerializer; 
    public function __construct($parent=null) {
        $this->_parent = $parent;
        $this->_position = 0;
        $this->_properties = new ApiProperties($this,$this->_apiProperties);
        $this->_objects = new ApiProperties($this,$this->_apiObjects);
        $this->_changes = new Changes($this);
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
                /**
                 * @var ArrayInterface $childObject 
                 */
                $childObject->__construct($this);
                $childObject->init();
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
    function get($name=null, ?string $className=null ) {
        if(!$name) {
            $out = [];
            foreach($this->properties() as $key) {
                $out[$key] = $this->_get($key);
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
            if($className) {
                $this->_set($name,$this->fixArray($this->_get($name),$className));
            }
            return $this->_get($name);
        }        
    }
    // the SOAPClient is producing objects instead of arrays. Fix this. 
    protected function fixArray($valueOld,string $className) {
        if(in_array(strtolower($className),["string","int","double","boolean","float","integer"])) {
            return $valueOld;
        }
        $obj = new $className();
        if($obj instanceof ArrayInterface) {
            /**
             * ArrayInterface $obj The proper array-object
             */
            if($valueOld instanceof $className) {
                return $valueOld;
            }
            if($valueOld instanceOf stdClass) {
                foreach($valueOld as  $array) {                    
                    foreach($array as $value) {
                        $obj->add($value);                        
                    }
                }
                return $obj;
            } 
            if(count($obj) == 1 && $obj[0] == null) {
                return null;
            } 
            return $obj;
        }        
        return $valueOld; 
    }
    public function _get($name) {
        if(property_exists($this,$name)) return $this->$name;
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
            if(!$this->properties()->exists($nameOrArray)) {
                return;
            } 
            // Value is other BaseClass
            if( ($value instanceOf BaseClass) ) {
                $value->parent($this);
            }            
            elseif($value instanceof \DateTime) {
                $value = $value->format(\DateTime::RFC3339);
            }            
            $this->_set($nameOrArray,$value);
        } 
        // set $this properties
        else {            
            // from other object with the same class. Don't overwrite DB-Properties. For API-Results
            if(($nameOrArray instanceof BaseClass)) {            
                $this->merge($nameOrArray);                
            } // convert from array
            elseif($nameOrArray instanceof \DateTime) {
                $this->_set($nameOrArray,$value);
            }
            elseif (is_array($nameOrArray) ||is_object($nameOrArray)) {
                foreach($nameOrArray as $key => $value) {
                    $this->_set($key,$value);
                }
            } else {
                // for DB results
                $this->_set($nameOrArray,$value);                
            }
        }        
        return $this; 
    }
    function setIncr(BaseClass $data) {
        $this->merge($data,true);
    }
    protected function merge(BaseClass $source, bool $incr=false) : BaseClass {
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
                $this->_set($key,$newValue->merge($value,$incr));
            } else {
                $newValue = $value; 
            }
            if(!($incr && !$newValue)) {
                $this->_set($key,$newValue);
            }
        }
        return $this;
    }
    public function setObjectName(?string $objectName = null)
    {
        if(!$objectName && \method_exists($this,"getObjectName")) {
            $objectName = $this->getObjectName();
        }
        $this->objectName = $objectName;
        return $objectName; 
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
        if($value === $this) {
            throw new Exception("Invalid circular nesting: $name should not have ".get_class($value). "as value."); 
        }
        $this->$name = $value;
        return $this;
    }
    public function create($property,$class) {
        $this->$property = new $class($this);
        $this->$property->parent($this);      
        return $this->$property;
    }
    public function createProperty($property,$type=null) : BaseClass {
        if($type) {
            $prop = new $type();
           $this->{"set".$property}($prop);
        } else {
            $prop = $this->{"create".$property}();
        }
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
    /**
     * @var obj|array $obj
     */
    public function deserialize($obj,bool $incremental = false) : self {
        if(!(is_object($obj) ||is_array($obj))) {
            throw new Exception('Please provide a array or object as $obj argument');
        }
        if(is_array($obj)) {
            //foreach($obj as $item) {
                /**
                 * @var ArrayInterface $this
                 */
                $this->add($obj);
            //}
        } elseif($obj) foreach($obj as $key => $value) {
            if($incremental && $value == null){
                continue;
            }
            // detect DateTime
            if(is_object($value) && property_exists($value,"timezone_type")) {
                $format = 'Y-m-d H:i:s.u';
                $date = DateTime::createFromFormat($format, $value->date);
                $date->setTimezone(new DateTimeZone($value->timezone));                
                $this->set($key,$date);
            } 
            //normal object
            elseif(is_object($value)) {
               if($this->objects()->exists($key)) {
                    /**
                     * @var DbClass $newObj
                     */
                    $newObj = $this->get($key) ?: $this->createProperty($key, $value->DbAttributes->_type);
                    if(is_string($newObj)) {
                        throw new Exception($key ." should be an object. String found: ".$newObj);
                    }
                    $newObj->deserialize($value);

               } 
               // with db-attributes
            elseif($key === "DbAttributes") {                    
                    foreach($value as $k => $v) {
                        /**
                         * @var DbBase $dbBase
                         */
                        $dbBase = $this;
                        $dbBase->db()->setAttribute($k,$v);
                    } 
               }
            // array
            } elseif(is_array($value) && $this->objects()->exists($key)) {
                /**
                 * @var DbArrayBase $arr
                 */                
                $arr = $this->createProperty($key);
                $arr->add($value);                 
            } else {
                $this->set($key,$value);
            }
        }
        $this->setObjectName();
        return $this;         
    }
    public function changes() : Changes {
        return $this->_changes;
    } 
}