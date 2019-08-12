<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetMessages. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetMessagesDb extends DbModel {
	protected $table="v3_GetMessages";
	public function getrequest(){
		return $this->getRelationObject("v3","GetMessagesRequest","request");
	}

}