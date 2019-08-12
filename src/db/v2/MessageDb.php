<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\db\v2;
use ascio\base\v2\DbModel;


class MessageDb extends DbModel {
	protected $table="v2_Message";
	public function getAttachments(){
		return $this->getRelationObject("v2","ArrayOfAttachment","Attachments");
	}

}