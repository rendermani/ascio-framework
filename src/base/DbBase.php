<?php

namespace ascio\base;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use stdClass;
use ascio\v2\Order;

class DbBase extends BaseClass {
    /**
     * @var DbModelBase $_db;
     */
    protected $_db;
    /**
     * @var ApiModelBase $_api;
     */
    protected $_api;    
    protected $_id;
    public function get($name=null,$class=null) {
        if (!parent::_get($name)) {
            if($class && $this->objects()->exists($name)) {
                $obj = new $class();
                if($obj instanceof DbArrayBase) {
                    $obj->parent($this);
                    $array = $obj->db()->{"get".$obj->getArrayKey()}();
                    $this->_set($name, $array);
                    return $obj;
                }  elseif ($obj instanceof DbBase) {
                    $obj->parent($this);
                    $relation = $this->db()->{"get".$name}();
                    $this->_set($name, $relation);  
                 }                                
            }
            return null;
        } elseif(!$name) {
            return $this->properties()->toArray();
        } elseif (is_object(parent::_get($name))) {
            return parent::_get($name);
        } elseif ($this->objects()->exists($name) ) {
             $result = $this->db()->{"get".$name}();
             return $result; 
        } else {
            return parent::get($name);
        }                        
    }
    public function getByHandle($handle) : DbBase {
        $this->handle($handle);
        try {
            $result = $this->db()->getByHandle();        
        } catch(ModelNotFoundException $e) {
            $this->api()->get();  
        }
        $this->changes()->setOriginal();        
        return $this; 
    }
    public function getById($id) : DbBase {
        $this->db()->getById($id);
        return $this; 
    }
    public function serialize() : Object {
        $this->db()->createDbProperties();
        return $this->properties()->cleanObject();
    }
    public function serializeIncremental() : Object {
        $this->db()->createDbProperties();
        return $this->properties()->cleanObject(true);
    }
    public function deserialize($obj) : DbBase {
        foreach((array )$obj as $key => $value) {
            if(is_object($value)) {
               if($this->objects()->exists($key)) {
                   $newObj = $this->_get($key) ?: $this->createProperty($key);
                   $newObj->deserialize($value);
               } elseif($key =="DbAttributes") {
                    foreach($value as $k => $v) {
                        $this->db()->setAttribute($k,$v);
                    } 
               }
            } elseif(is_array($value)) {
                if($this->objects()->exists($key)) {
                    foreach($value as $v) {                        
                        $this->createItem($v);
                    }                    
                } 
            } else {
                $this->set($key,$value);
            }
        }
        return $this;         
    }
    /**
     * @return DbModelBase
     */
    public function db($db=null)  {
        if($db) {
            $this->_db = $db;
            $this->_db->parent($this);
        }
        return $this->_db; 
    }
    public function sync($handle=null) {
        // TEST: Test this. update, create
        $name = (new \ReflectionClass($this))->getShortName();
        $action = "none";
        if(method_exists($this->api()->getClient(),"get".$name)) {
            $handle = $handle ?: $this->handle()->value; 
            if(!$handle) return;
            $this->handle($handle);            
            try {
                $this->db()->getByHandle(); 
                $action = "update";
            } catch (ModelNotFoundException $e) {
                $this->db()->_part_of_order = $this->parent() instanceof Order; 
                $action = "create";
            }
            try {
                $this->api()->get();                
            } catch(AscioException $e) {
                echo $e->getMessage()."\n";
            }
        }
        return $action;        
    }
    public function setExisting() {
        $usedClasses = [
            "ascio\\v2\\Contact",
            "ascio\\v2\\NameServer",
            "ascio\\v2\\DnsSecKey"
        ];
        if(!in_array(get_class($this),$usedClasses)) {
            return;
        }
        $data = $this->properties()->toArray();
        $remove = [
            "_id",
            "_parent_id",
            "_parent_type",
            "_parent_db_type",
            "_status",
            "created_at",
            "updated_at",
            "_part_of_order",
            "CreDate",
            "Status",
            "Handle"
        ];
        foreach($remove as $key) {
            unset($data[$key]);
        }
        $result = $this->db()->where($data)->first();
        if($result) {
            $this->set($result); 
            $this->db($result);
        }
    }
    
}