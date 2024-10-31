<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;
use Illuminate\Database\Schema\Blueprint;

class MessageDb extends DbModel {
	protected $table="v2_Message";
	protected $_customColumnTypes = [
		"Body" => ["type" => "text", "parameters" => ["nullable" => true]]
	];
	public function getAttachments(){
		return $this->getRelationObject("v2","ArrayOfAttachment","Attachments");
	}
	public function createTables(?\Closure $blueprintFunction=null) {
		parent::createTables(function(Blueprint $table) use ($blueprintFunction){
			$table->string('_orderId')->index()->nullable();	
			if($blueprintFunction) $blueprintFunction($table);
		}); 
	}
	public function scopeOrderId($query,$orderId) {
		return $query->where('_orderId',$orderId);
	}

}