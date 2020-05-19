<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfMessage

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ArrayOfMessageDb;
use ascio\api\v3\ArrayOfMessageApi;


class ArrayOfMessage extends DbArrayBase  {

	protected $_apiProperties=["Message"];
	protected $_apiObjects=["Message"];
	protected $Message;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfMessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfMessageDb|null $db
	* @return ArrayOfMessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessage (?Iterable $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?Iterable {
		return $this->get("Message", "\\ascio\\v3\\Message");
	}
	public function createMessage () : \ascio\v3\Message {
		return $this->create ("Message", "\\ascio\\v3\\Message");
	}
	public function addMessage () : \ascio\v3\Message {
		return $this->add("Message","\\ascio\\v3\\Message",func_get_args());
	}
}