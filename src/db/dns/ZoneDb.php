<?php

// XSLT-WSDL-Client. Generated DB-Model class of Zone. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbModel;


class ZoneDb extends DbModel {
	protected $table="dns_Zone";
	public function getRecords(){
		return $this->getRelationObject("dns","ArrayOfRecord","Records");
	}

}