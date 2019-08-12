<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfCallbackStatus. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbArrayModel;


class ArrayOfCallbackStatusDb extends DbArrayModel {
	protected $table="v2_ArrayOfCallbackStatus";
	public function getCallbackStatus(){
		return $this->getRelationObject("v2","CallbackStatus","CallbackStatus");
	}

}