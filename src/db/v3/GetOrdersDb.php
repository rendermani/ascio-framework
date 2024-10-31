<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetOrders. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetOrdersDb extends DbModel {
	protected $table="v3_GetOrders";
	public function getrequest(){
		return $this->getRelationObject("v3","GetOrdersRequest","request");
	}

}