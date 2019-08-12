<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class MessageDb extends DbModel {
	protected $table="v3_Message";
	public function getAttachments(){
		return $this->getRelationObject("v3","ArrayOfAttachment","Attachments");
	}

}