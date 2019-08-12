<?php

// XSLT-WSDL-Client. Generated DB-Model class of AckQueueMessage. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class AckQueueMessageDb extends DbModel {
	protected $table="v3_AckQueueMessage";
	public function getrequest(){
		return $this->getRelationObject("v3","AckQueueMessageRequest","request");
	}

}