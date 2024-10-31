<?php

// XSLT-WSDL-Client. Generated DB-Model class of CustomerReference. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class CustomerReferenceDb extends DbModel {
	protected $table="v3_CustomerReference";
	public function getExtensions(){
		return $this->getRelationObject("v3","Extensions","Extensions");
	}

}