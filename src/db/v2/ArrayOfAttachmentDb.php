<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfAttachment. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbArrayModel;


class ArrayOfAttachmentDb extends DbArrayModel {
	protected $table="v2_ArrayOfAttachment";
	public function getAttachment(){
		return $this->getRelationObject("v2","Attachment","Attachment");
	}

}