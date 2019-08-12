<?php

// XSLT-WSDL-Client. Generated PHP class of GetQueueMessageRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetQueueMessageRequestDb;
use ascio\api\v3\GetQueueMessageRequestApi;


class GetQueueMessageRequest extends DbBase  {

	protected $_apiProperties=["MessageId"];
	protected $_apiObjects=[];
	protected $MessageId;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetQueueMessageRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetQueueMessageRequestDb|null $db
	* @return GetQueueMessageRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessageId (?int $MessageId = null) : \ascio\v3\GetQueueMessageRequest {
		$this->set("MessageId", $MessageId);
		return $this;
	}
	public function getMessageId () : ?int {
		return $this->get("MessageId", "int");
	}
}