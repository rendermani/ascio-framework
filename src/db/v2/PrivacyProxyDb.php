<?php

// XSLT-WSDL-Client. Generated DB-Model class of PrivacyProxy. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;


class PrivacyProxyDb extends DbModel {
	protected $table="v2_PrivacyProxy";
	public function getExtensions(){
		return $this->getRelationObject("v2","Extensions","Extensions");
	}

}