<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractMark. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class AbstractMarkDb extends DbModel {
	protected $table="v3_AbstractMark";
	public function getLabels(){
		return $this->getRelationObject("v3","ArrayOfstring","Labels");
	}
	public function getOwner(){
		return $this->getRelationObject("v3","Registrant","Owner");
	}
	public function getReseller(){
		return $this->getRelationObject("v3","Contact","Reseller");
	}
	public function getExtensions(){
		return $this->getRelationObject("v3","Extensions","Extensions");
	}

}