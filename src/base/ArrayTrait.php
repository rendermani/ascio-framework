<?php

namespace ascio\base;

trait ArrayTrait   {
    private $_position = 0;    
    private $_arrayProperty;
    private $key;
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_position = 0;
        $this->key = $this->getArrayKey();
        $this->_arrayProperty = $this->properties()->index(0);
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
    public function toJson() {
        return json_encode($this->toArray());
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
    public function createItem($data=null) : BaseClass {
        if($data instanceof BaseClass) {
            $arrayItem = $data; 
        } elseif(is_object($data)) {
            $arrayItem->deserialize($data);
        } else { 
            $arrayItem = $this->createProperty($this->getArrayKey());
        }        
        $this->push($arrayItem);
        return $arrayItem; 
    }
    public function add($args) {
        if(is_array($args) || ($args instanceof \ArrayAccess)) {
            foreach($args as $arg) {
                $this->push($arg);
            }
        } else {
            $this->push($args);
            return  $args;
        }
        return $this;
    }
    protected function addItem($args,$class) {
        if(
            ($args[0] instanceof BaseClass) &&
            !($args[0] instanceof ArrayInterface)
         ) {
             $this->push($args[0]);
             return $args[0];
         }
        if(in_array($class,["string","int","double","float"])) {
            $this->push($args[0]);
            $newObject = $args[0];
        } else {
            $newObject = new $class;
            $newObject->parent($this);
            foreach($args as $nr => $arg) {
                $key = $newObject->properties()->index($nr);
                $newObject->set($key,$arg);
            }              
            $this->push($newObject);            
        }  
        return $newObject;             
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
}