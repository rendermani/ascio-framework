<?php

// XSLT-WSDL-Client. Generated DB-Model class of QueueItem. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;

class QueueItemDb extends DbModel {
	protected $table="v2_QueueItem";
	protected $_customColumnTypes = ["Msg" => ["type" => "text", "parameters" => ["nullable" => true]]];
	public function getAttachments(){
		return $this->getRelationObject("v2","ArrayOfAttachment","Attachments");
	}
	public function getStatusList(){
		return $this->getRelationObject("v2","ArrayOfCallbackStatus","StatusList");
	}
	public function scopeByOrderId($query,$orderId) {
		return $query->where("OrderId", $orderId);
	}
}