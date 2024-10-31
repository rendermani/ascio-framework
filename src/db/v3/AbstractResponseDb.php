<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class AbstractResponseDb extends DbModel {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}

}