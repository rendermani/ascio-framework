<?php

// XSLT-WSDL-Client. Generated DB-Model class of PollQueue. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class PollQueueDb extends DbModel {
	protected $table="v3_PollQueue";
	public function getrequest(){
		return $this->getRelationObject("v3","PollQueueRequest","request");
	}

}