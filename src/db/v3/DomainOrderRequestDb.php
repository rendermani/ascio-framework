<?php

// XSLT-WSDL-Client. Generated DB-Model class of DomainOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class DomainOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getDomain(){
		return $this->getRelationObject("v3","Domain","Domain");
	}

}