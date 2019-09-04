<?php

// XSLT-WSDL-Client. Generated PHP class of GetMark

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetMarkDb;
use ascio\api\v3\GetMarkApi;


abstract class GetMark extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMarkDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMarkDb|null $db
	* @return GetMarkDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setRequest (?\ascio\v3\GetMarkRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetMarkRequest {
		return $this->get("request", "\\ascio\\v3\\GetMarkRequest");
	}
	public function createRequest () : \ascio\v3\GetMarkRequest {
		return $this->create ("request", "\\ascio\\v3\\GetMarkRequest");
	}
}