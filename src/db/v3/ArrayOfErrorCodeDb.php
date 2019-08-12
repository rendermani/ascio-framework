<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfErrorCode. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfErrorCodeDb extends DbArrayModel {
	protected $table="v3_ArrayOfErrorCode";
	public function getErrorCode(){
		return $this->getRelationObject("v3","ErrorCode","ErrorCode");
	}

}