<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetOrder. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetOrderDb extends DbModel {
	protected $table="v3_GetOrder";
	public function getrequest(){
		return $this->getRelationObject("v3","GetOrderRequest","request");
	}

}