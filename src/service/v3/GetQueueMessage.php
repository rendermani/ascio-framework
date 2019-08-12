<?php

// XSLT-WSDL-Client. Generated PHP class of GetQueueMessage

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetQueueMessageDb;
use ascio\api\v3\GetQueueMessageApi;


class GetQueueMessage extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetQueueMessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetQueueMessageDb|null $db
	* @return GetQueueMessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\GetQueueMessageRequest $request = null) : \ascio\v3\GetQueueMessage {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetQueueMessageRequest {
		return $this->get("request", "\\ascio\\v3\\GetQueueMessageRequest");
	}
	public function createRequest () : \ascio\v3\GetQueueMessageRequest {
		return $this->create ("request", "\\ascio\\v3\\GetQueueMessageRequest");
	}
}