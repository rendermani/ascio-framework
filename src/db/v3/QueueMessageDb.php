<?php

// XSLT-WSDL-Client. Generated DB-Model class of QueueMessage. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;#


class QueueMessageDb extends DbModel {
	protected $table="v3_QueueMessage";
	protected $_customColumnTypes = [
		 	"Message" => [
				"type" => "text", 
			    "parameters" => ["nullable" => true ]
			 ],
		 	"ErrorCodes" => [
				"type" => "json", 
			    "parameters" => ["nullable" => true ]
			 ],
		];

	public function getAttachments(){
		return $this->getRelationObject("v3","ArrayOfAttachment","Attachments");
	}
	public function getErrorCodes(){
		return $this->getRelationObject("v3","ArrayOfErrorCode","ErrorCodes");
	}

}