<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfZoneLogEntry. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbArrayModel;


class ArrayOfZoneLogEntryDb extends DbArrayModel {
	protected $table="dns_ArrayOfZoneLogEntry";
	public function getZoneLogEntry(){
		return $this->getRelationObject("dns","ZoneLogEntry","ZoneLogEntry");
	}

}