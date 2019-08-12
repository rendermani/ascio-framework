<?php

// XSLT-WSDL-Client. Generated DB-Model class of Domain. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;
use ascio\base\DbModelBase;
use ascio\v2\Order;

class DomainDb extends DbModel {
	protected $table="v2_Domain";
	
	public function getRegistrant(){
		return $this->getRelationObject("v2","Registrant","Registrant");
	}
	public function getAdminContact(){
		return $this->getRelationObject("v2","Contact","AdminContact");
	}
	public function getTechContact(){
		return $this->getRelationObject("v2","Contact","TechContact");
	}
	public function getBillingContact(){
		return $this->getRelationObject("v2","Contact","BillingContact");
	}
	public function getResellerContact(){
		return $this->getRelationObject("v2","Contact","ResellerContact");
	}
	public function getNameServers(){
		return $this->getRelationObject("v2","NameServers","NameServers");
	}
	public function getTrademark(){
		return $this->getRelationObject("v2","TradeMark","Trademark");
	}
	public function getDnsSecKeys(){
		return $this->getRelationObject("v2","DnsSecKeys","DnsSecKeys");
	}
	public function getPrivacyProxy(){
		return $this->getRelationObject("v2","PrivacyProxy","PrivacyProxy");
	}

}