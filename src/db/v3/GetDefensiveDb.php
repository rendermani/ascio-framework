<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetDefensive. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetDefensiveDb extends DbModel {
	protected $table="v3_GetDefensive";
	public function getrequest(){
		return $this->getRelationObject("v3","GetDefensiveRequest","request");
	}

}