<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfMessage. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfMessageDb extends DbArrayModel {
	protected $table="v3_ArrayOfMessage";
	public function getMessage(){
		return $this->getRelationObject("v3","Message","Message");
	}

}