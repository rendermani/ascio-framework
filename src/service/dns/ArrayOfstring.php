<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfstring

namespace ascio\service\dns;
use ascio\base\dns\DbArrayBase;
use ascio\db\dns\ArrayOfstringDb;
use ascio\api\dns\ArrayOfstringApi;


abstract class ArrayOfstring extends DbArrayBase  {

	protected $_apiProperties=["string"];
	protected $_apiObjects=[];
	protected $string;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfstringDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfstringDb|null $db
	* @return ArrayOfstringDb
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
	public function setString (?Iterable $string = null) : self {
		$this->set("string", $string);
		return $this;
	}
	public function getString () : ?Iterable {
		return $this->get("string", "string");
	}
	public function addString () : string {
		return $this->add("string","string",func_get_args());
	}
}