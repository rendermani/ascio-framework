<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetDefensiveResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetDefensiveResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getDefensiveInfo(){
		return $this->getRelationObject("v3","DefensiveInfo","DefensiveInfo");
	}

}