<?php

// XSLT-WSDL-Client. Generated PHP class of PollQueue

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\PollQueueDb;
use ascio\api\v3\PollQueueApi;


class PollQueue extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PollQueueDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param PollQueueDb|null $db
	* @return PollQueueDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\PollQueueRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\PollQueueRequest {
		return $this->get("request", "\\ascio\\v3\\PollQueueRequest");
	}
	public function createRequest () : \ascio\v3\PollQueueRequest {
		return $this->create ("request", "\\ascio\\v3\\PollQueueRequest");
	}
}