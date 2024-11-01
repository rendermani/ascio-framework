<?php

namespace ascio\lib;

use ascio\base\BaseClass;
use ascio\base\ArrayBase;
use ascio\base\ArrayInterface;
use ascio\base\DbBase;

class Changes  {
    /**
     * @var BaseClass $original
     */
    protected $original;
        /**
     * @var BaseClass $new
     */
    protected $changedProperties = [];
    protected $new;
    public function __construct(BaseClass $new) 
    {        
        $this->new = $new; 
    }
    private function setEmptyOrignal() {
        if(!$this->original) {
            $class = get_class($this->new);
            $this->original = new $class();
        }
    }
    public function setOriginal() {        
        $this->original = $this->new->clone();       
        if($this->new instanceof ArrayInterface) {
            if(!(
                is_string($this->new[0]) || 
                is_int($this->new[0]) ||
                is_float($this->new[0]))) {       
                foreach($this->new as $obj) {
                    $obj->changes()->setOriginal();
                    if($obj && method_exists($obj,"db")) $obj->db()->syncOriginal();
                }
            }
        } else {
            foreach($this->new->objects() as $key => $obj) {
                if($obj instanceof BaseClass ) {
                    $obj->changes()->setOriginal();
                } 
                if($obj instanceof DbBase) {                    
                    $obj->db()->syncOriginal();
                }
            }
        }        
    }
    public function setNew(BaseClass $new) {        
        $this->new = $new; 
    }
    public function hasChanges(?array $exclude=[]) {
        $this->setEmptyOrignal();
        foreach($this->new->properties() as $key => $value) {
            if(!is_object($value)) {
                if(in_array($key,$exclude)) {
                    return false; 
                }
                if($value !== $this->original->_get($key)) {
                    return true;
                }
            } 
        }
        return false; 
    }
    public function hasDeepChanges() {  
        $this->setEmptyOrignal();   
        if($this->new instanceof ArrayInterface) {
            /**
             * @var ArrayInterface $original
             */
            $original = $this->original;
            if($this->new->count() !== $original->count()) return true; 
            foreach ($this->new as $obj) {
                if($obj->changes()->hasDeepChanges()) return true;
            }
        } else {
            if($this->hasChanges()) return true;
            foreach($this->new->objects() as $obj) {
                if($obj && $obj->changes()->hasDeepChanges()) {
                    return true;
                }
            }
        }      
        return false;
    }
    public function propertyChanged($name) {
        $this->setEmptyOrignal();
        $newProperty = $this->new->_get($name);        
        if($newProperty instanceof ArrayInterface) {
            foreach ($newProperty as $key => $obj) {
                if($obj->changes()->hasChanges()) {
                    return true;
                }
            }
        } elseif(($newProperty instanceof BaseClass)) {
            return $newProperty->changes()->hasDeepChanges();
        } else {
            if(!($newProperty == $this->original->_get($name))) {
                $this->changedProperties[$name] = ["old" => $this->original->_get($name), "new" => $newProperty];
                return true;
            }
        }
        return false;
    }
    public function getChanges() {
        $this->setEmptyOrignal();
        $changes = [];        
        if($this->new instanceof ArrayInterface) {
            return $this->getArrayChanges();
        } else {
            foreach($this->new->properties() as $key => $value) {
                if($key == "TransferLock" || $key=="DeleteLock" || $key=="UpdateLock" ) {
                    continue;
                }
                if($this->propertyChanged($key)) {
                    $changes[$key] = $value;
                }
            }
            return $changes; 
        }
    }
    private function getArrayChanges() {
        $changes = [];
        foreach($this->new as $obj) {
            $changes[] = $obj->changes();
        }
        return $changes;
    }

    public function getReduced() {
        $this->setEmptyOrignal();
        $className = get_class($this->new);
        $newObject = new $className();
        foreach($this->getChanges() as $key => $value) {
            $newObject->{"set".$key}($value);        
        }
    }
    public function getReducedDeep() {
        $this->setEmptyOrignal();
        $className = get_class($this->new);
        $newObject = new $className();
        foreach($this->getChanges() as $key => $value) {
            if(is_object($value)) {
                $newObject->{"set".$key}($value->changes()->getReduced());
            } else {
                $newObject->{"set".$key}($value);
            }          
        }
    }
    public function sync() {
        $this->setEmptyOrignal();
        $this->original = $this->new->clone();
    }
}