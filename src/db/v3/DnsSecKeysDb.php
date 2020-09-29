<?php

// XSLT-WSDL-Client. Generated DB-Model class of DnsSecKeys. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class DnsSecKeysDb extends DbModel {
	protected $table="v3_DnsSecKeys";
	public function getDnsSecKey1(){
		return $this->getRelationObject("v3","DnsSecKey","DnsSecKey1");
	}
	public function getDnsSecKey2(){
		return $this->getRelationObject("v3","DnsSecKey","DnsSecKey2");
	}
	public function getDnsSecKey3(){
		return $this->getRelationObject("v3","DnsSecKey","DnsSecKey3");
	}
	public function getDnsSecKey4(){
		return $this->getRelationObject("v3","DnsSecKey","DnsSecKey4");
	}
	public function getDnsSecKey5(){
		return $this->getRelationObject("v3","DnsSecKey","DnsSecKey5");
	}

}