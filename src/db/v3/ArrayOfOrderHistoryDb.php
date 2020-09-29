<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfOrderHistory. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfOrderHistoryDb extends DbArrayModel {
	protected $table="v3_ArrayOfOrderHistory";
	public function getOrderHistory(){
		return $this->getRelationObject("v3","OrderHistory","OrderHistory");
	}

}