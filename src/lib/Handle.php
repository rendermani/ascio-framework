<?php
namespace ascio\lib;

use ascio\base\DbBase;

class Handle {
    public $key;
    public $value;
    function __construct(DbBase $obj, $value=null)
    {
        if(!$obj->api()) {
            return null; 
        }
        if(!property_exists($obj->api(),"idProperty")) {
            return null;
        }
        $handleKey = $obj->api()->idProperty;
        if($value) $obj->set($handleKey,$value); 
        $this->key = $handleKey;
        $this->value = $obj->get($handleKey);
    }

    /**
     * Get the value of key
     */ 
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }
    public function exists() {
        return $this->key && $this->value; 
    }
}