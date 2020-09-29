<?php

// XSLT-WSDL-Client. Generated PHP class of KeyValue

namespace ascio\service\v3;
use ascio\db\v3\KeyValueDb;
use ascio\api\v3\KeyValueApi;
use ascio\base\v3\DbBase;


class KeyValue extends DbBase  {

	protected $_apiProperties=["Key", "Value"];
	protected $_apiObjects=[];
	protected $Key;
	protected $Value;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new KeyValueDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param KeyValueDb|null $db
	* @return KeyValueDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setKey (?string $Key = null) : self {
		$this->set("Key", $Key);
		return $this;
	}
	public function getKey () : ?string {
		return $this->get("Key", "string");
	}
	public function setValue (?string $Value = null) : self {
		$this->set("Value", $Value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("Value", "string");
	}
}