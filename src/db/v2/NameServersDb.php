<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameServers. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;


class NameServersDb extends DbModel {
	protected $table="v2_NameServers";
	public function getNameServer1(){
		return $this->getRelationObject("v2","NameServer","NameServer1");
	}
	public function getNameServer2(){
		return $this->getRelationObject("v2","NameServer","NameServer2");
	}
	public function getNameServer3(){
		return $this->getRelationObject("v2","NameServer","NameServer3");
	}
	public function getNameServer4(){
		return $this->getRelationObject("v2","NameServer","NameServer4");
	}
	public function getNameServer5(){
		return $this->getRelationObject("v2","NameServer","NameServer5");
	}
	public function getNameServer6(){
		return $this->getRelationObject("v2","NameServer","NameServer6");
	}
	public function getNameServer7(){
		return $this->getRelationObject("v2","NameServer","NameServer7");
	}
	public function getNameServer8(){
		return $this->getRelationObject("v2","NameServer","NameServer8");
	}
	public function getNameServer9(){
		return $this->getRelationObject("v2","NameServer","NameServer9");
	}
	public function getNameServer10(){
		return $this->getRelationObject("v2","NameServer","NameServer10");
	}
	public function getNameServer11(){
		return $this->getRelationObject("v2","NameServer","NameServer11");
	}
	public function getNameServer12(){
		return $this->getRelationObject("v2","NameServer","NameServer12");
	}
	public function getNameServer13(){
		return $this->getRelationObject("v2","NameServer","NameServer13");
	}

}