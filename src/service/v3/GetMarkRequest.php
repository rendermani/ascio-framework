<?php

// XSLT-WSDL-Client. Generated PHP class of GetMarkRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetMarkRequestDb;
use ascio\api\v3\GetMarkRequestApi;


abstract class GetMarkRequest extends DbBase  {

	protected $_apiProperties=["Handle"];
	protected $_apiObjects=[];
	protected $Handle;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMarkRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMarkRequestDb|null $db
	* @return GetMarkRequestDb
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
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
}