<?php

// XSLT-WSDL-Client. Generated DB-Model class of Trademark. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class TrademarkDb extends AbstractMarkDb {
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
	public function getGoodsAndServicesClasses(){
		return $this->getRelationObject("v3","ArrayOfint","GoodsAndServicesClasses");
	}

}