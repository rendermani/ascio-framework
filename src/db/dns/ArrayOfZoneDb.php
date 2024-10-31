<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfZone. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbArrayModel;


class ArrayOfZoneDb extends DbArrayModel {
	protected $table="dns_ArrayOfZone";
	public function getZone(){
		return $this->getRelationObject("dns","Zone","Zone");
	}

}