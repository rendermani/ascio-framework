<?php

// XSLT-WSDL-Client. Generated PHP class of User

namespace ascio\service\dns;
use ascio\db\dns\UserDb;
use ascio\api\dns\UserApi;
use ascio\base\dns\DbBase;


class User extends DbBase  {

	protected $_apiProperties=["CreatedDate", "Email", "Name", "Password", "RequireTfa", "RequiredToChangePassword", "Role", "TfaSetupComplete", "UpdatedDate", "UserName"];
	protected $_apiObjects=[];
	protected $CreatedDate;
	protected $Email;
	protected $Name;
	protected $Password;
	protected $RequireTfa;
	protected $RequiredToChangePassword;
	protected $Role;
	protected $TfaSetupComplete;
	protected $UpdatedDate;
	protected $UserName;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UserDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new UserApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return UserApi
	*/
	public function api($api = null) : ?\ascio\base\ApiModelBase {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
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
	public function setCreatedDate (?\DateTime $CreatedDate = null) : self {
		$this->set("CreatedDate", $CreatedDate);
		return $this;
	}
	public function getCreatedDate () : ?\DateTime {
		return $this->get("CreatedDate", "\\DateTime");
	}
	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
	}
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setPassword (?string $Password = null) : self {
		$this->set("Password", $Password);
		return $this;
	}
	public function getPassword () : ?string {
		return $this->get("Password", "string");
	}
	public function setRequireTfa (?bool $RequireTfa = null) : self {
		$this->set("RequireTfa", $RequireTfa);
		return $this;
	}
	public function getRequireTfa () : ?bool {
		return $this->get("RequireTfa", "bool");
	}
	public function setRequiredToChangePassword (?bool $RequiredToChangePassword = null) : self {
		$this->set("RequiredToChangePassword", $RequiredToChangePassword);
		return $this;
	}
	public function getRequiredToChangePassword () : ?bool {
		return $this->get("RequiredToChangePassword", "bool");
	}
	public function setRole (?string $Role = null) : self {
		$this->set("Role", $Role);
		return $this;
	}
	public function getRole () : ?string {
		return $this->get("Role", "string");
	}
	public function setTfaSetupComplete (?bool $TfaSetupComplete = null) : self {
		$this->set("TfaSetupComplete", $TfaSetupComplete);
		return $this;
	}
	public function getTfaSetupComplete () : ?bool {
		return $this->get("TfaSetupComplete", "bool");
	}
	public function setUpdatedDate (?\DateTime $UpdatedDate = null) : self {
		$this->set("UpdatedDate", $UpdatedDate);
		return $this;
	}
	public function getUpdatedDate () : ?\DateTime {
		return $this->get("UpdatedDate", "\\DateTime");
	}
	public function setUserName (?string $UserName = null) : self {
		$this->set("UserName", $UserName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("UserName", "string");
	}
}