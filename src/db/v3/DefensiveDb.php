<?php

// XSLT-WSDL-Client. Generated DB-Model class of Defensive. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class DefensiveDb extends DbModel {
	protected $table="v3_Defensive";
	public function getOwner(){
		return $this->getRelationObject("v3","Registrant","Owner");
	}
	public function getAdmin(){
		return $this->getRelationObject("v3","Contact","Admin");
	}
	public function getTech(){
		return $this->getRelationObject("v3","Contact","Tech");
	}
	public function getBilling(){
		return $this->getRelationObject("v3","Contact","Billing");
	}
	public function getReseller(){
		return $this->getRelationObject("v3","Contact","Reseller");
	}

}