<?php

// XSLT-WSDL-Client. Generated DB-Model class of CreateOrder. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class CreateOrderDb extends DbModel {
	protected $table="v3_CreateOrder";
	public function getrequest(){
		return $this->getRelationObject("v3","AbstractOrderRequest","request");
	}

}