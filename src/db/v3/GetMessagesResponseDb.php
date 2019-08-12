<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetMessagesResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetMessagesResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getMessages(){
		return $this->getRelationObject("v3","ArrayOfMessage","Messages");
	}

}