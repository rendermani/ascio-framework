<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetMark. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetMarkDb extends DbModel {
	protected $table="v3_GetMark";
	public function getrequest(){
		return $this->getRelationObject("v3","GetMarkRequest","request");
	}

}