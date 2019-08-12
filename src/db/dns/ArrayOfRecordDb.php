<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfRecord. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbArrayModel;


class ArrayOfRecordDb extends DbArrayModel {
	protected $table="dns_ArrayOfRecord";
	public function getRecord(){
		return $this->getRelationObject("dns","Record","Record");
	}

}