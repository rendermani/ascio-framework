<?php

// XSLT-WSDL-Client. Generated DB-Model class of DefensiveOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class DefensiveOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getDefensive(){
		return $this->getRelationObject("v3","Defensive","Defensive");
	}

}