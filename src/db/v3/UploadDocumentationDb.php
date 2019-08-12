<?php

// XSLT-WSDL-Client. Generated DB-Model class of UploadDocumentation. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class UploadDocumentationDb extends DbModel {
	protected $table="v3_UploadDocumentation";
	public function getrequest(){
		return $this->getRelationObject("v3","UploadDocumentationRequest","request");
	}

}