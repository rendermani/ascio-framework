<?php

namespace ascio\base;

use ArrayAccess;
use Countable;
use Illuminate\Contracts\Support\Jsonable;
use Iterator;
use JsonSerializable;
use stdClass;

class ArrayBase extends BaseClass implements ArrayAccess,ArrayInterface,Iterator,Countable, Jsonable, JsonSerializable {
    use ArrayTrait;
    public function __construct($parent=null) {
        parent::__construct($parent);
        $this->_position = 0;
        $this->_arrayProperty = $this->properties()->index(0);
        $arrayValue = $this[$this->_arrayProperty];
        if($arrayValue && !is_array($arrayValue)) {
            $this[$this->_arrayProperty] = [$arrayValue];
        } 
    }
    public function create($property,$class) {
        $this->$property = $this->$property ?: [];
        $item = new $class($this);
        $item->parent($this);
        array_push($this->$property,$item);
        return $item;
    } 
    public function deserialize($obj, bool $incremental = false): BaseClass
    {
        foreach($obj as $item) {            
            $this->add($item);
        }
        return $this; 
    }
    public function set($nameOrArray,$value=null) {
        if($this instanceof ArrayBase && is_string($value)) {
            $value = $this->deserialize($value);
       } 
    }
}