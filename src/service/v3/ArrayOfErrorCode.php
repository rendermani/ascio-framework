<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfErrorCode

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfErrorCodeDb;
use ascio\api\v3\ArrayOfErrorCodeApi;
use ascio\base\v3\DbArrayBase;


class ArrayOfErrorCode extends DbArrayBase  {

	protected $_apiProperties=["ErrorCode"];
	protected $_apiObjects=["ErrorCode"];
	protected $ErrorCode;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfErrorCodeDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfErrorCodeDb|null $db
	* @return ArrayOfErrorCodeDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setErrorCode (?Iterable $ErrorCode = null) : self {
		$this->set("ErrorCode", $ErrorCode);
		return $this;
	}
	public function getErrorCode () : ?Iterable {
		return $this->get("ErrorCode", "\\ascio\\v3\\ErrorCode");
	}
	public function createErrorCode () : \ascio\v3\ErrorCode {
		return $this->create ("ErrorCode", "\\ascio\\v3\\ErrorCode");
	}
	public function addErrorCode ($item = null) : \ascio\v3\ErrorCode {
		return $this->addItem("ErrorCode","\\ascio\\v3\\ErrorCode",func_get_args());
	}
}