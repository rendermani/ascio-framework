<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfAttachment. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfAttachmentDb extends DbArrayModel {
	protected $table="v3_ArrayOfAttachment";
	public function getAttachment(){
		return $this->getRelationObject("v3","Attachment","Attachment");
	}

}