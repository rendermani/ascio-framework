<?php

// XSLT-WSDL-Client. Generated PHP class of AckQueueMessageRequest

namespace ascio\service\v3;
use ascio\db\v3\AckQueueMessageRequestDb;
use ascio\api\v3\AckQueueMessageRequestApi;
use ascio\base\v3\DbBase;


class AckQueueMessageRequest extends DbBase  {

	protected $_apiProperties=["MessageId"];
	protected $_apiObjects=[];
	protected $MessageId;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AckQueueMessageRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AckQueueMessageRequestDb|null $db
	* @return AckQueueMessageRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessageId (?int $MessageId = null) : self {
		$this->set("MessageId", $MessageId);
		return $this;
	}
	public function getMessageId () : ?int {
		return $this->get("MessageId", "int");
	}
}