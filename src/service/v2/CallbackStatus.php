<?php

// XSLT-WSDL-Client. Generated PHP class of CallbackStatus

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\CallbackStatusDb;
use ascio\api\v2\CallbackStatusApi;


class CallbackStatus extends DbBase  {

	protected $_apiProperties=["Message", "Status"];
	protected $_apiObjects=[];
	protected $Message;
	protected $Status;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new CallbackStatusDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param CallbackStatusDb|null $db
	* @return CallbackStatusDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessage (?string $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?string {
		return $this->get("Message", "string");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
}