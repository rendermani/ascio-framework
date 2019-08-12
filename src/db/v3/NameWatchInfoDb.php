<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameWatchInfo. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class NameWatchInfoDb extends DbModel {
	protected $table="v3_NameWatchInfo";
	public function getOwner(){
		return $this->getRelationObject("v3","Registrant","Owner");
	}
	public function getReseller(){
		return $this->getRelationObject("v3","Contact","Reseller");
	}

}