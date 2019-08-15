<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessages

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetMessagesDb;
use ascio\api\v3\GetMessagesApi;


class GetMessages extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMessagesDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMessagesDb|null $db
	* @return GetMessagesDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\GetMessagesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetMessagesRequest {
		return $this->get("request", "\\ascio\\v3\\GetMessagesRequest");
	}
	public function createRequest () : \ascio\v3\GetMessagesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetMessagesRequest");
	}
}