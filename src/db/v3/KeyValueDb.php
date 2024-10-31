<?php

// XSLT-WSDL-Client. Generated DB-Model class of KeyValue. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class KeyValueDb extends DbModel {
	protected $table="v3_KeyValue";
	public function syncToDb() {
		if(!$this->parent()->properties()->hasData()) {
			return; 
		}	
		$parentKey = $this->parent()->parent()->db()->getKey();
		$parentId = $parentKey ? $parentKey : $this->_parent_id;
		$keyValue = $this->where(
			[
				"_parent_id" => $parentId,
				"Key" => $this->parent()->getKey()
			])->first();
		if($keyValue) {			
			$this->setAttribute("_id",$keyValue->getKey());
			$this->exists = true;
		}
		$this->setAttribute("_parent_id",$parentId);
		$this->Value = $this->parent()->getValue();
		$this->Key = $this->parent()->getKey();
		$this->setDefaultAttributes();
		$this->save();
	}
}