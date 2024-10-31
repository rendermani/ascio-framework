<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetNameWatch. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetNameWatchDb extends DbModel {
	protected $table="v3_GetNameWatch";
	public function getrequest(){
		return $this->getRelationObject("v3","GetNameWatchRequest","request");
	}

}