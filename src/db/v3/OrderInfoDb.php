<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\db\v3;

use ascio\base\DbBase;
use ascio\base\v3\DbModel;
use ascio\v3\OrderInfo;
use ascio\base\BaseClass;
use Illuminate\Database\Schema\Blueprint;

class OrderInfoDb extends DbModel {
	protected $table="v3_OrderInfo";
	public function getOrderRequest(){
		return $this->getRelationObject("v3","AbstractOrderRequest","OrderRequest");
	}
	public function getByOrderId($orderId=null) {
		if(!$orderId) $orderId = $this->parent()->getOrderId();
		assert($orderId !== null ,"OrderId exists");
		$result = $this->where(["OrderId" => $orderId])->firstOrFail();
		$this->parent()->set($result);		
		$this->parent()->changes()->setOriginal();
	}
	public function createTables(?\Closure $blueprintFunction=null) {
		parent::createTables(function(Blueprint $table) use ($blueprintFunction){
			$table->string('_message')->nullable();
			$table->integer('_code')->nullable()->index();
			$table->json('_values')->nullable();	
			$table->string('_status')->index()->nullable();	
			$table->string('_blocking')->index()->nullable();
			$table->string('_topic')->index()->nullable();
			$table->string('_objectName')->index()->nullable();
			$table->integerIncrements('_nr');
			if($blueprintFunction) $blueprintFunction($table);
		}); 
	}
	public function parent(?BaseClass $parent=null) : ?OrderInfo {
		if(!$parent) {
            return $this->_parent; 
        }
		$this->_parent = $parent;
		return $this->_parent; 
	}

}