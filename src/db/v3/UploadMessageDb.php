<?php

// XSLT-WSDL-Client. Generated DB-Model class of UploadMessage. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class UploadMessageDb extends DbModel {
	protected $table="v3_UploadMessage";
	public function getrequest(){
		return $this->getRelationObject("v3","UploadMessageRequest","request");
	}

}