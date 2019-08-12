<?php

// XSLT-WSDL-Client. Generated DB-Model class of DnsSecKeys. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;


class DnsSecKeysDb extends DbModel {
	protected $table="v2_DnsSecKeys";
	public function getDnsSecKey1(){
		return $this->getRelationObject("v2","DnsSecKey","DnsSecKey1");
	}
	public function getDnsSecKey2(){
		return $this->getRelationObject("v2","DnsSecKey","DnsSecKey2");
	}
	public function getDnsSecKey3(){
		return $this->getRelationObject("v2","DnsSecKey","DnsSecKey3");
	}
	public function getDnsSecKey4(){
		return $this->getRelationObject("v2","DnsSecKey","DnsSecKey4");
	}
	public function getDnsSecKey5(){
		return $this->getRelationObject("v2","DnsSecKey","DnsSecKey5");
	}

}