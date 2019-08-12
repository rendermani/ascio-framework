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
        return $this->toArray()[$this->_position];
    }

    public function key() {
        return $this->_position;
    }

    public function next() {
        ++$this->_position;
    }

    public function valid() {
        return isset($this->toArray()[$this->_position]);
    }
    public function push($value) {
        $this->toArray()[] = $value;
    }
    public function pop() {
        return array_pop($this->toArray());
    }
    public function shift() {
        return array_shift($this->toArray());
    }
    public function first() {
        return $this->toArray()[0];
    }
    public function last() {
        return end($this->toArray());
    }    
    public function index($nr) {
        return $this->toArray()[$nr];
    }
    public function &toArray() {
        if(!$this->getObject()->_get($this->getArrayKey())) {
            $this->getObject()->_set($this->getArrayKey(),[]);
        }
        return $this->getObject()->_get($this->getArrayKey());
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
        return count( $this->toArray());
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
    public function add($var,$class,$args) {
        if($class == "string" || $class="int") {
            $this->getObject()->{$this->getArrayKey()}[] = $args[0];
            return $args[0];
        }
    }
}