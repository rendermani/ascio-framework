<?php

// XSLT-WSDL-Client. Generated DB-Model class of Extensions. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbArrayModel;


class ExtensionsDb extends DbArrayModel {
	protected $table="v2_Extensions";
	public function getExtension(){
		return $this->getRelationObject("v2","Extension","Extension");
	}
}