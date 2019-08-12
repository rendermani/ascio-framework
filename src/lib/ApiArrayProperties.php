<?php
namespace ascio\lib;

use ascio\base\BaseClass;
use ascio\base\ArrayInterface;
use ascio\base\ArrayTrait;
use Countable;

class ApiArrayProperties extends ApiProperties implements ArrayInterface,\Iterator {
    use ArrayTrait;    
    public function __construct(BaseClass $object, $keys) {
        $this->_position = 0;
        $this->key = $keys[0];
        $this->_arrayProperty = $object->_get($keys[0]);  
        if(!$this->_arrayProperty) {
            $this->_arrayProperty = [];
            $object->_set($keys[0],$this->_arrayProperty);            
        }
        $this->object = $object;     
    }
    public function hasData() {
        return count( $this->_arrayProperty) > 0;
    }
    public function getObject()
    {
        return $this->object;
    }
    public function getArrayKey() {
        return $this->key;
    }   
}
