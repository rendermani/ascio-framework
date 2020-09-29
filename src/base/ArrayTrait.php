<?php

namespace ascio\base;

use ascio\base\dns\Base;

trait ArrayTrait   {
    private $_position = 0;    
    private $_arrayProperty;
    private $key;
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_position = 0;
        $this->key = $this->getArrayKey();
        $this->_arrayProperty = $this->properties()->index(0);
        if(!is_array($this[$this->_arrayProperty])) {
            $this[$this->_arrayProperty] = [$this[$this->_arrayProperty]];
        } 
    }
    public function rewind() {
        $this->_position = 0;
    }
    public function current() {
        return $this[$this->_position];
    }
    public function key() {
        return $this->_position;
    }
    public function next() {
        ++$this->_position;
    }
    public function valid() {
        return isset($this[$this->_position]);
    }
    public function push($value) {
        if($this->count() == 0) {
            $this->getObject()->_set($this->getArrayKey(), []);
        }
        array_push($this->{$this->getArrayKey()},$value);
        return $this->{$this->getArrayKey()};
    }
    public function pop() {
        return array_pop($this->{$this->getArrayKey()});
    }
    public function shift() {
        return array_shift($this->{$this->getArrayKey()});
    }
    public function first() {
        return $this[0];
    }
    public function last() {
        return end($this->toArray());
    }    
    public function index($nr) {
        return $this[$nr];
    }
    public function toArray() {
        if(!$this->getObject()->_get($this->getArrayKey())) {
            $this->getObject()->_set($this->getArrayKey(),[]);
        }
        return $this->getObject()->{$this->getArrayKey()};
    }
    public function fromArray($array) {    
        $this->getObject()->_set($this->getArrayKey(),$array);
    }
    public function toJson($options=0)
    {
        return json_encode($this->jsonSerialize(),$options); 
    } 
    public function jsonSerialize() {
        $out = [];
        foreach($this as $key => $value) {
            if($value instanceof BaseClass) {
                $out[$key] = $value->properties()->cleanObject();
            } else {
                $out[$key] = $value; 
            }
        }
        return $out; 
    }
    public function fromJson($json) {
        return $this->fromArray(json_decode($json));
    }
    public function getArrayKey() {
        return $this->properties()->index(0);
    }    
    public function count() : int {
        return count($this->toArray());
    }
    public function getObject() {
        return $this; 
    }
    /**
     * For special usage. Easier to use add instead.
     */
    public  function create($property,$class) {
        $this->$property = $this->$property ?: [];
        $item = new $class($this);
        $this->push($item);    
        return $item;
    } 
    /**
     * Function for adding everything to an array. 
     * @var BaseClass|ArrayInterface|Array|stdObject|null $items 
     * BaseClass, int, float, string: Pushed to array. 
     * Object: deserialized to array. 
     * Null: empty object is created and added.  
     * Array, ArrayBase, DbArrayBase: an array of any valid objectts. 
     * @return self use this for adding multiple elements in a chain. To return the created element, use addPropertyName()
     */
    public function add($items = null) : self{    
        if(is_array($items) || ($items instanceof \ArrayAccess)) {
            foreach($items as $item) {
                $this->add($item);
            }
        } 
        // no conversion needed
        elseif (
            $items instanceof BaseClass  ||
            is_string($items) ||
            is_int($items) ||
            is_float($items)            
        ) { 
            $this->push($items);
        } elseif(is_object($items)) {
            $newItem = $this->createProperty($this->getArrayKey());
            $newItem->deserialize($items);
        }
        // create a new BaseClass object
        else       
        {
            $this->createProperty($this->getArrayKey());
        }
        return $this;
    }
    /**
     * addItem is used in the generated stub classes. Don't use it directly
     * @return BaseClass the BaseClass. 
     */
    protected function addItem($args,$class=null, $additionalArgs=null) {
        if(is_array($additionalArgs) && count($additionalArgs) > 0){
            $this->add($additionalArgs[0]);
        } elseif (is_array($additionalArgs)) {
            $this->add();
        }  else {
            $this->add($args);
        }     
        return $this[count($this)-1];
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->{$this->getArrayKey()}[] = $value;
        } else {
            $this->{$this->getArrayKey()}[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->{$this->getArrayKey()}[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->{$this->getArrayKey()}[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->{$this->getArrayKey()}[$offset]) ? $this->{$this->getArrayKey()}[$offset] : null;
    }
    public function reverse() {
        return array_reverse($this->{$this->getArrayKey()});
    }
}