<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameWatchOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class NameWatchOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getNameWatch(){
		return $this->getRelationObject("v3","NameWatch","NameWatch");
	}

}