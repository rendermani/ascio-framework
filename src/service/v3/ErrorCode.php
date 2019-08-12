<?php

// XSLT-WSDL-Client. Generated PHP class of ErrorCode

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\ErrorCodeDb;
use ascio\api\v3\ErrorCodeApi;


class ErrorCode extends DbBase  {

	protected $_apiProperties=["Code", "Message"];
	protected $_apiObjects=[];
	protected $Code;
	protected $Message;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ErrorCodeDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ErrorCodeDb|null $db
	* @return ErrorCodeDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCode (?string $Code = null) : \ascio\v3\ErrorCode {
		$this->set("Code", $Code);
		return $this;
	}
	public function getCode () : ?string {
		return $this->get("Code", "string");
	}
	public function setMessage (?string $Message = null) : \ascio\v3\ErrorCode {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?string {
		return $this->get("Message", "string");
	}
}