<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfOrderInfo. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfOrderInfoDb extends DbArrayModel {
	protected $table="v3_ArrayOfOrderInfo";
	public function getOrderInfo(){
		return $this->getRelationObject("v3","OrderInfo","OrderInfo");
	}

}