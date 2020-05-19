<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class DomainDb extends DbModel {
	protected $table="v3_Domain";
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
	public function getNameServers(){
		return $this->getRelationObject("v3","NameServers","NameServers");
	}
	public function getTrademark(){
		return $this->getRelationObject("v3","DomainTradeMark","Trademark");
	}
	public function getDnsSecKeys(){
		return $this->getRelationObject("v3","DnsSecKeys","DnsSecKeys");
	}
	public function getPrivacyProxy(){
		return $this->getRelationObject("v3","PrivacyProxy","PrivacyProxy");
	}

}