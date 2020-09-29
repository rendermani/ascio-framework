<?php
namespace ascio\base;

use Exception;

class DbArrayModelBase extends DbModelBase  {
    public function syncToDb() {
        if($this->parent()->count() > 0 && is_object($this->parent()->index(0))) {
            foreach($this->parent() as $childObject) {
                $parent = $this->parent()->parent();
                $parentKey = $parent->db()->getKey() ? $parent->db()->getKey() : $childObject->db()->_parent_id;
                $childObject->db()->setAttribute("_parent_id",$parentKey);
                $childObject->db()->setAttribute("_parent_type",get_class($this->parent()));
                $childObject->db()->setAttribute("_parent_db_type",get_class($parent));
                $childObject->db()->setAttribute("_part_of_order",$parent->db()->getAttribute("_part_of_order"));
                $childObject->db()->syncToDb();
            }
        }           
    }
    public function createDbProperties() {
		$this->setDefaultAttributes();		
		foreach($this->parent() as $obj) {
            $parentDb = $this->parent()->parent()->db();
            $obj->db()->createDbProperties();		
            $obj->db()->setAttribute("_parent_id",$parentDb->_id);
            $obj->db()->setAttribute("_parent_type",get_class($this->parent()->parent()));
            $obj->db()->setAttribute("_part_of_order",$this->_part_of_order);            
		}
	}
    public function syncFromDb() {        
        if(!$this->parent()->parent()) {
            throw new Exception("Object must be linked to a parent before syncing to the DB.");
        }
        // key the name of the array element
        $key = $this->parent()->getArrayKey();
        // use the parent as for query. child the current object is related to parent,
        $parentDb = $this->parent()->parent()->db();
        $itemElements = [];
        foreach($parentDb->$key as $key => $item) {                        
            // create the item
            $itemElements[] = $itemElement = $this->parent()->createProperty($key);            
            // add value
            $itemElement->set($item);            
            // sync items sub-elements
            $itemElement->db()->syncFromDb();
        } 
        // add the array to current object
        $this->parent()->set($itemElements);
    } 
    public function deleteRecursive() {
	    foreach ($this->parent() as $key => $object) {				
			$object->db()->deleteRecursive();
		}
	}  
}
