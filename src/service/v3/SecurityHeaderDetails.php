<?php

// XSLT-WSDL-Client. Generated PHP class of SecurityHeaderDetails

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\SecurityHeaderDetailsDb;
use ascio\api\v3\SecurityHeaderDetailsApi;


abstract class SecurityHeaderDetails extends DbBase  {

	protected $_apiProperties=["Account", "Password"];
	protected $_apiObjects=[];
	protected $Account;
	protected $Password;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SecurityHeaderDetailsDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param SecurityHeaderDetailsDb|null $db
	* @return SecurityHeaderDetailsDb
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
	public function setAccount (?string $Account = null) : self {
		$this->set("Account", $Account);
		return $this;
	}
	public function getAccount () : ?string {
		return $this->get("Account", "string");
	}
	public function setPassword (?string $Password = null) : self {
		$this->set("Password", $Password);
		return $this;
	}
	public function getPassword () : ?string {
		return $this->get("Password", "string");
	}
}