<?php

// XSLT-WSDL-Client. Generated PHP class of AckQueueMessage

namespace ascio\service\v3;
use ascio\db\v3\AckQueueMessageDb;
use ascio\api\v3\AckQueueMessageApi;
use ascio\base\v3\DbBase;


class AckQueueMessage extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AckQueueMessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AckQueueMessageDb|null $db
	* @return AckQueueMessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\AckQueueMessageRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\AckQueueMessageRequest {
		return $this->get("request", "\\ascio\\v3\\AckQueueMessageRequest");
	}
	public function createRequest () : \ascio\v3\AckQueueMessageRequest {
		return $this->create ("request", "\\ascio\\v3\\AckQueueMessageRequest");
	}
}