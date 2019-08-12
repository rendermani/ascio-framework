<?php

// XSLT-WSDL-Client. Generated DB-Model class of UploadMessageRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class UploadMessageRequestDb extends DbModel {
	protected $table="v3_UploadMessageRequest";
	public function getMessage(){
		return $this->getRelationObject("v3","Message","Message");
	}

}