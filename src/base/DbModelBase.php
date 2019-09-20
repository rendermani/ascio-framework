<?php
namespace ascio\base;

use Illuminate\Database\Eloquent\Model;
use ascio\base\BaseClass;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\Ascio;
use ascio\base\DbArrayBase;
use ascio\v3\CourtValidatedMark;
use ascio\lib\OrderStatus;
use ReflectionClass;
use ascio\v2\Order;

class DbModelBase extends Model {
	protected $_parent;
	protected $_usedColums = [];
	protected $_customColumnTypes = [];
	protected $primaryKey = "_id";
	protected $changes;
	protected $dates = ['CreDate','ExpDate'];
	public $incrementing = false;  
	/**
	 * @var DbBase $object 
	 */
	protected $object;
	protected function _construct(array $data) {
		parent::_construct($data);
	}
	public function getRelationObject($api,$class,$property) {
		$className = "\\ascio\\".$api."\\".$class; 
		$dbClass = "\\ascio\\db\\".$api."\\".$class."Db"; 
		$newObject = new $className();
		if($newObject instanceof ArrayBase) {
			$array = json_decode($this->parent()->_get($property));
			$newObject->fromArray($array);
			$result = $newObject;
		} elseif($this instanceOf DbArrayModelBase) {
			$result = $this->getArrayRelation($dbClass,$property,$newObject);
		} elseif($this->parent() && (is_integer($this->parent()->_get($property)) || is_string($this->parent()->_get($property)))){
			$result =  $this->getForwardRelation($dbClass,$property);			
		} else {
			$result =  $this->getBackwardRelation($dbClass,$property);
		}
		if($result instanceOf BaseClass) {
			$result->parent($this->parent());
		}
		return $result; 
	}
	private function getForwardRelation($dbClass,$property) {
		$propertyValue = $this->$property ? $this->$property : $this->parent()->_get($property);
		$result = $dbClass::where(["_id" => $propertyValue])->first();
		if(!$result) return; 
		$class = $result->_type; 
		$resultObj = new  $class(); 
		$resultObj->set($result);		
		$this->parent()->set($property,$resultObj);
		return $resultObj;
	}
	private function getBackwardRelation($dbClass,$property) {
		if(!$this->getParentId()) return; 
		$result = $dbClass::where(["_parent_id" => $this->getParentId()])->first();
		if(!$result) return; 
		$resultObj = $this->parent()->createProperty($property);
		$resultObj->set($result);		
		$this->parent()->set($property,$resultObj);
		return $resultObj; 
	}
	private function getArrayRelation($dbClass,$property)  {
		$result = $dbClass::where(["_parent_id" => $this->getParentId()])->get();
		$resultArray = [];
		foreach($result as $nr => $item) {			
			$resultObj = $this->parent()->createProperty($property);
			$resultObj->set($item);
			$resultArray[] = $resultObj;
		}
		$this->parent()->{"set".$property}($resultArray);		
		return $this->parent();
	}
	public function syncToDb() {
		if(!$this->parent()->properties()->hasData()) {
			return; 
		}
		$this->setDefaultAttributes();
		foreach($this->parent()->properties() as $key => $value) {			
			if($value instanceOf DbArrayBase) {
				$value->db()->syncToDb();
			} elseif($value instanceOf DbBase) {													
				$this->setParentDefaultAttributes($this,$value);			
				$value->db()->syncToDb();
				$this->{$key} = $value->db()->getKey();
			} else {
				$this->$key = $value; 
			}		
		}
		$this->convertArrays();
		$this->setExists();
		parent::save();		
		return $this->getKey();
	}
	private function setParentDefaultAttributes($parent,$child) {
		$child->db()->setAttribute("_parent_id",$parent->getAttribute("_id"));		
		$child->db()->setAttribute("_part_of_order",$parent->getAttribute("_part_of_order"));		
		$child->db()->setAttribute("_parent_db_type",get_class($parent->parent()->db()));
		$child->db()->setAttribute("_parent_type",get_class($parent->parent()));				
	}
	protected function convertArrays() {
		foreach($this->attributes as $key => $value) {
			if($value instanceof ArrayBase) {
				$this->setAttribute($key,$value->toJson()); 
			} 
		}
	}
	public function createDbProperties() {
		$this->setDefaultAttributes();		
		foreach($this->parent()->objects() as $obj) {
			if($obj instanceof DbBase) {				
				$this->setParentDefaultAttributes($this,$obj);		
				$obj->db()->createDbProperties();
			}				
		}
	}
	protected function setDefaultAttributes() {
		parent::setAttribute("_environment", $this->config()->environment);
		parent::setAttribute("_account", $this->config()->v2->partner ?: $this->config()->v2->account);
		parent::setAttribute("_type",get_class($this->parent()));
		parent::setAttribute("_config",$this->config()->id);
		if(!$this->_id) {			
			parent::setAttribute("_id",uniqid("ascio.object.",true));
			$this->exists = false; 
		}
		if((new \ReflectionClass($this->parent()))->getShortName() == "Order") {
			parent::setAttribute("_part_of_order",true);
		}			
	}
	protected function setParentKeys() {
		foreach ($this->parent()->objects() as $object) {													
			if( ! ($object instanceOf DbBase)) continue ; 
			if(!($object && $object->properties()->hasData())) continue;
			$object->db()->setAttribute("_parent_id",$this->getKey());
			if (isset($object->db()->_id))	 {
				$object->db()->exists = true;
			}
			if(!($object instanceof DbArrayBase)) {
				$object->db()->save();
			}
			
		}
	}
	public function getParentId() : ?string {
		if(! $this->parent()) return null;
		if(! $this->parent()->parent()) return null;
		if(! ($this->parent()->parent() instanceof DbBase)) return null;
		$parentId = $this->parent()->parent()->db()->_id;
		$existingId = $this->_parent_id; 
		return $parentId ? $parentId : $existingId; 
	}
	public function syncFromDb() {
		if($this->_id) {
			$this->exists = true;
			parent::refresh();
			foreach($this->attributes as $key => $value) {
				$this->parent()->_set($key,$value); 
			}
			$this->parent()->api()->changes()->setOriginal();
		}			
	}
	public function deleteRecursive() {
		foreach ($this->parent()->objects() as $key => $object) {			
			if($object instanceof DbBase) {
				$object->db()->deleteRecursive();
			}
		}
		$this->delete();
	}
	/**
	 * Gets an object by the handle, like DomainHandle, Handle, OrderId and other IDs. 
	 * Sets the parent of the res
	 * @var string $handle if no handle is passed, $this->parent()->handle() is used
	 * @return DbModelBase|null
	 */
	public function getByHandle($handle=null) {
		$partOfOrder = ($this->parent()->parent() instanceof Order) || ($this->parent() instanceof Order) ? 1 : 0 ;
		$this->parent()->handle($handle ?: null);
		$handle = $this->parent()->handle();

		if(!($handle && $handle->value)) return;
		$result = $this
			->where("_part_of_order",$partOfOrder)
			->where($handle->key,$handle->value)
			->firstOrFail();
		//set the parent of the result DbModelBase object
		$result->parent($this->parent());
		//set the data of the result DbModelBase object
		$this->parent()->set($result);
		//reset changes
		$this->parent()->changes()->setOriginal();
		
		return $result;
	}
	public function getById(string $id) {
		$this->_id = $id;
		$this->syncFromDb();
	}	
	public function setExists() : DbModelBase{
		$this->exists =  $this->where([ "_id" => $this->_id])->exists();
		return $this;
	}
	public function refreshDeep() {
		foreach($this->parent()->objects() as $object) {
			$object->db()->refreshDeep();
		}
		$this->syncFromDb();
	}	
	public function getId() {
		return $this->_id;
	}
	public function parent(?BaseClass $parent=null) {
        if(!$parent) {
            return $this->_parent; 
        }
		$this->_parent = $parent;
		return $this->_parent; 
    }
    public function config()  {
        return  Ascio::getConfig()->get();
	}
	public function createTables(?\Closure $blueprintFunction=null) {
		$migration = new DbMigration();
		$migration->setTable($this->getTable());
		$migration->parent($this->parent());
		$migration->createTables($blueprintFunction);
	}
}
