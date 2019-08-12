<?php

// XSLT-WSDL-Client. Generated DB-Model class of CourtValidatedMark. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class CourtValidatedMarkDb extends AbstractMarkDb {
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