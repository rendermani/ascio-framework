<?php

// XSLT-WSDL-Client. Generated DB-Model class of ZoneLogEntry. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbModel;


class ZoneLogEntryDb extends DbModel {
	protected $table="dns_ZoneLogEntry";
	public function getRecord(){
		return $this->getRelationObject("dns","Record","Record");
	}

}