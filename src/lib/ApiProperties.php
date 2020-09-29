<?php
namespace ascio\lib;

use ascio\base\BaseClass;
use ascio\base\ArrayInterface;
use ascio\base\ArrayBase;
use ascio\base\DbBase;
use stdClass;

class ApiProperties implements \Iterator {
    protected $keys = [];
    protected $object;
    protected $position; 
    
    function __construct(BaseClass $object, $keys=[])
    {
        $this->object = $object;
        $this->keys = $keys; 
        
    }
    function exists($property) {
        return in_array($property,$this->keys);
    }
    public function mapTo($mapFunction) {
        return (array) $this;
    }
    public function mapFrom($array,$mapFunction) {
        return $this->object->set($array);
    }
    public function rewind() {
        $this->position = 0;
    }
    public function current() {
        $property = $this->keys[$this->position];
        return $this->object->get($property);
    }

    public function key() {
        return $this->keys[$this->position];
    }

    public function next() {
        ++$this->position;
    }
    public function get($name) {
        if($this->keys[$name]) {
            return $this->object->get($name);
        }
    }
    public function valid() {
        return count( $this->keys) >= $this->position + 1;
    }
    public function toArray() {
        $out = [];
        if($this->object instanceof ArrayInterface) {
            $out[$this->object->getArrayKey()] = [];            
            foreach($this->object as $obj) {
                if($obj instanceof BaseClass) {
                    array_push( $out[$this->object->getArrayKey()],$obj->properties()->toArray());
                } else {
                    array_push( $out[$this->object->getArrayKey()],$obj);
                }
                
            }            
        } else {
            foreach($this->keys as $key) {
                $object =$this->object->get($key);
                if($object instanceOf BaseClass) {
                    $out[$key] = $object->properties()->toArray();
                } else {
                    $out[$key] = $object;
                }
            }
        }        
        return $out;
    }
    public function toJson() {
        return json_encode($this->cleanObject(),JSON_PRETTY_PRINT);
    }
    public function cleanObject(?bool $incremental = false, ?bool $removeEmpty = false) {
        $out = (object)[];
        foreach($this->keys as $key) {
            if($incremental &&! $this->getObject()->changes()->propertyChanged($key)) {
                continue;
            }
            $object =$this->object->get($key);            
            if($object instanceof ArrayInterface) {
                $out->$key = [];
                foreach($object as $item) {
                    $out->$key[] = 
                        $item instanceof BaseClass ?
                        $item->properties()->cleanObject($incremental) :
                        $item;
                }
            } elseif($object instanceOf BaseClass) {
                $out->$key= $object->properties()->cleanObject($incremental);                                
            } else {
                if(!($removeEmpty && $object==null)) {
                    $out->$key= $object;
                } 
            }
        }
        if($this->object instanceOf DbBase) {            
            $ext = new stdClass();
            $attributes = $incremental ? $this->object->db()->getDirty() : $this->object->db()->getAttributes(); 
            foreach($attributes as $key => $value) {
                if(!$this->exists($key)) {
                    $ext->$key = $value;
                }                
            }
            $ext->_id = $this->object->db()->_id;   
            $ext->_parent_id = $this->object->db()->_parent_id;   
            $ext->_type = $this->object->db()->_type; 
            $ext->_parent_type = $this->object->db()->_parent_type; 
            $ext->_parent_db_type = $this->object->db()->_parent_db_type; 
            $out->DbAttributes = $ext;   

        }
        return  $out;
    }
    public function index($nr) {
        return $this->keys[$nr];
    }
    public function hasData() {
        foreach($this->keys as $key) {
            if($key=="CreDate") continue;
            if($this->object->_get($key)) {
                return true; 
            }
        }
    }

    /**
     * Get the object that is linked to the properties()
     * @return BaseClass
     */ 
    public function getObject() 
    {
        return $this->object;
    }
}
