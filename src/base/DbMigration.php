<?php
namespace ascio\base;

use Illuminate\Database\Eloquent\Model;
use ascio\base\BaseClass;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
use ascio\lib\Ascio;
use ascio\base\DbArrayBase;
use ascio\v2\Order;

class DbMigration extends DbModelBase {
	public function createTables(?\Closure $blueprintCallback=null) {
		// don't create a table for every substituted type. One table		
		if($this->parent()->substitutions() && $this->parent()->substitutions()->isSubstituted()) {
			return;
		}
		if($this->createSubstituedTables()) {			
			return; 
		}
		if(!$this->parent() instanceOf DbArrayBase) {	
			if(!Capsule::Schema()->hasTable($this->table)) {
				$self = $this;
				Capsule::Schema()->create($this->table,function(Blueprint $table) use ($self, $blueprintCallback)  {	
					$table->string('_id')->primary();					
					$this->createObjectProperties($this->parent(),$table);	
					$this->createAdditionalProperties($table);				
                    $this->createDefaultProperties($table);
                    if($blueprintCallback) {
                        $blueprintCallback($table);
                    }
                    $table->timestamps();
				});
			}	
		}
		// create sub-tables
		foreach ($this->parent()->objects() as $key => $object) {
			if(!$object || $object instanceOf ArrayBase) {
				continue;
			}
			$object = $object ? $object : $this->parent()->createProperty($key);
			$db = is_array($object) ? $object[0]->db() : $object->db();
			$db->createTables();
		}	
	}
	private function createSubstituedTables () {
		if(!(
			$this->parent()->substitutions() &&
			$this->parent()->substitutions()->hasSubstitutes() 
			)) {
			return false; 
		}
		if(!Capsule::Schema()->hasTable($this->table)) {
			$properties = [];
			foreach($this->parent()->substitutions() as $name => $class) {
				$newObject = new $class; 					
				foreach($newObject->properties() as $key => $value){
					$properties[$key] = $newObject; 
				}
			}
			Capsule::Schema()->create($this->table,function(Blueprint $table) use ($properties) {					
				$table->string('_id')->primary();
				foreach($properties as $key => $newObject) {					
					$this->createObjectProperty($newObject,$table,$key);	
				}	
				$this->createAdditionalProperties($table);				
                $this->createDefaultProperties($table);
                $table->timestamps();
			});
		}	
		return true;
	}
	private function createObjectProperties(BaseClass $object, Blueprint $table) {
		foreach($object->properties() as $key => $property) {										
			$this->createObjectProperty($object,$table,$key);						
		}
	}
	private function createObjectProperty($object,Blueprint $table,$key) {
		if ($this->_customColumnTypes[$key]) {
			$col = $this->_customColumnTypes[$key];
			$table->addColumn($col["type"],$key,$col["parameters"] ?: []);
		} else if($object->objects()->exists($key)) {
			$property = $object->createProperty($key);
			if($property instanceOf ArrayBase) {
				$type = $this->getColumnType($object,$key);
				$table->json($key)->nullable();
			}  else {
				$table->string($key)->index()->nullable();
				if(method_exists($property,"db")) {
					$property->db()->createTables();
				}
			}								
		}
		else {
			// create property if not exists
			$type = $this->getColumnType($object,$key);
			$table->$type($key)->nullable();
		}		
	}
	private function createAdditionalProperties(Blueprint $table) {
		foreach($this->_customColumnTypes as $key => $columnType) {
			if(!$this->parent()->properties()->exists($key)) {
				$table->addColumn($columnType["type"],$key,$columnType["parameters"]);
			}			
		}

	}
	private function createDefaultProperties(Blueprint $table) {		
		$table->string('_ext_id')->index()->nullable();
		$table->string('_account')->index()->nullable();			
		$table->string('_environment')->index();
		$table->string('_client')->index()->nullable();			
		$table->string('_admin')->index()->nullable();					
		$table->boolean('_part_of_order')->index()->default(0);					
		$table->string('_config')->index();					
		$table->boolean('_order')->index()->nullable();		
		$table->string('_hash')->index()->nullable();		
		$table->string('_type')->index()->nullable();			
		$table->string('_parent_id')->index()->nullable();			
		$table->string('_parent_type')->index()->nullable();
		$table->string('_parent_db_type')->index()->nullable();			
	}

	private function getColumnType($object,$name) {
		$method = new \ReflectionMethod($object,"get".$name);
		$ns = 'ascio\\service\\v2\\';		
		switch($method->getReturnType()) {
			case "int" :
			case $ns."integer" : return "integer";
			case $ns."Double"  : return "double";
			case $ns."Base64"  : return "text";
			case $ns."Date"  : return "date";
			case $ns."DateTime"  : return "dateTime";
			default : return "string";
		};
	}
}