<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetOrdersResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetOrdersResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getOrdersInfo(){
		return $this->getRelationObject("v3","ArrayOfOrderInfo","OrdersInfo");
	}

}