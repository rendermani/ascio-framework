<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetOrderResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetOrderResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getOrderInfo(){
		return $this->getRelationObject("v3","OrderInfo","OrderInfo");
	}

}