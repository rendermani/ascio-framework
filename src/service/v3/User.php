<?php

// XSLT-WSDL-Client. Generated PHP class of User

namespace ascio\service\v3;
use ascio\db\v3\UserDb;
use ascio\api\v3\UserApi;
use ascio\base\v3\DbBase;


class User extends DbBase  {

	protected $_apiProperties=["UserName", "Name", "Email", "UserRights"];
	protected $_apiObjects=["UserRights"];
	protected $UserName;
	protected $Name;
	protected $Email;
	protected $UserRights;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UserDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UserDb|null $db
	* @return UserDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setUserName (?string $UserName = null) : self {
		$this->set("UserName", $UserName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("UserName", "string");
	}
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
	}
	public function setUserRights (?\ascio\v3\ArrayOfstring $UserRights = null) : self {
		$this->set("UserRights", $UserRights);
		return $this;
	}
	public function getUserRights () : ?\ascio\v3\ArrayOfstring {
		return $this->get("UserRights", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createUserRights () : \ascio\v3\ArrayOfstring {
		return $this->create ("UserRights", "\\ascio\\v3\\ArrayOfstring");
	}
}