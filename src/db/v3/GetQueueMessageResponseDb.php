<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetQueueMessageResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetQueueMessageResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getMessage(){
		return $this->getRelationObject("v3","QueueMessage","Message");
	}

}