<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfCallbackStatus

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfCallbackStatusDb;
use ascio\api\v2\ArrayOfCallbackStatusApi;
use ascio\base\v2\DbArrayBase;


class ArrayOfCallbackStatus extends DbArrayBase  {

	protected $_apiProperties=["CallbackStatus"];
	protected $_apiObjects=["CallbackStatus"];
	protected $CallbackStatus;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfCallbackStatusDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfCallbackStatusDb|null $db
	* @return ArrayOfCallbackStatusDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCallbackStatus (?Iterable $CallbackStatus = null) : self {
		$this->set("CallbackStatus", $CallbackStatus);
		return $this;
	}
	public function getCallbackStatus () : ?Iterable {
		return $this->get("CallbackStatus", "\\ascio\\v2\\CallbackStatus");
	}
	public function createCallbackStatus () : \ascio\v2\CallbackStatus {
		return $this->create ("CallbackStatus", "\\ascio\\v2\\CallbackStatus");
	}
	public function addCallbackStatus ($item = null) : \ascio\v2\CallbackStatus {
		return $this->addItem("CallbackStatus","\\ascio\\v2\\CallbackStatus",func_get_args());
	}
}