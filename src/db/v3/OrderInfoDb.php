<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class OrderInfoDb extends DbModel {
	protected $table="v3_OrderInfo";
	public function getOrderRequest(){
		return $this->getRelationObject("v3","AbstractOrderRequest","OrderRequest");
	}
	public function getByOrderId($orderId=null) {
		if(!$orderId) $orderId = $this->parent()->getOrderId();
		assert($orderId !== null ,"OrderId exists");
		$result = $this->where(["OrderId" => $orderId])->firstOrFail();
		$this->parent()->set($result->attributes);	
	}

}