<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetQueueMessage. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetQueueMessageDb extends DbModel {
	protected $table="v3_GetQueueMessage";
	public function getrequest(){
		return $this->getRelationObject("v3","GetQueueMessageRequest","request");
	}

}