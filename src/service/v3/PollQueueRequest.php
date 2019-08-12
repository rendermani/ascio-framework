<?php

// XSLT-WSDL-Client. Generated PHP class of PollQueueRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\PollQueueRequestDb;
use ascio\api\v3\PollQueueRequestApi;


class PollQueueRequest extends DbBase  {

	protected $_apiProperties=["MessageType", "ObjectType"];
	protected $_apiObjects=[];
	protected $MessageType;
	protected $ObjectType;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PollQueueRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param PollQueueRequestDb|null $db
	* @return PollQueueRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessageType (?string $MessageType = null) : \ascio\v3\PollQueueRequest {
		$this->set("MessageType", $MessageType);
		return $this;
	}
	public function getMessageType () : ?string {
		return $this->get("MessageType", "string");
	}
	public function setObjectType (?string $ObjectType = null) : \ascio\v3\PollQueueRequest {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?string {
		return $this->get("ObjectType", "string");
	}
}