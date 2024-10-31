<?php

// XSLT-WSDL-Client. Generated DB-Model class of UploadDocumentationRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class UploadDocumentationRequestDb extends DbModel {
	protected $table="v3_UploadDocumentationRequest";
	public function getDocuments(){
		return $this->getRelationObject("v3","ArrayOfAttachment","Documents");
	}

}