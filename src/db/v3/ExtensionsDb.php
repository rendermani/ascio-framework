<?php

// XSLT-WSDL-Client. Generated DB-Model class of Extensions. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ExtensionsDb extends DbArrayModel {
	protected $table="v3_Extensions";
	public function getKeyValue(){
		return $this->getRelationObject("v3","KeyValue","KeyValue");
	}

}