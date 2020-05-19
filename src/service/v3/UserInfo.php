<?php

// XSLT-WSDL-Client. Generated PHP class of UserInfo

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\UserInfoDb;
use ascio\api\v3\UserInfoApi;


class UserInfo extends Base  {

	protected $_apiProperties=["UserName", "Name", "Email", "Created", "IsLocked", "LastSuccessfulLoginDate", "LastLoginAttemptDate", "InvalidPasswordAttempts", "LastUpdated"];
	protected $_apiObjects=[];
	protected $UserName;
	protected $Name;
	protected $Email;
	protected $Created;
	protected $IsLocked;
	protected $LastSuccessfulLoginDate;
	protected $LastLoginAttemptDate;
	protected $InvalidPasswordAttempts;
	protected $LastUpdated;

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
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setIsLocked (?bool $IsLocked = null) : self {
		$this->set("IsLocked", $IsLocked);
		return $this;
	}
	public function getIsLocked () : ?bool {
		return $this->get("IsLocked", "bool");
	}
	public function setLastSuccessfulLoginDate (?\DateTime $LastSuccessfulLoginDate = null) : self {
		$this->set("LastSuccessfulLoginDate", $LastSuccessfulLoginDate);
		return $this;
	}
	public function getLastSuccessfulLoginDate () : ?\DateTime {
		return $this->get("LastSuccessfulLoginDate", "\\DateTime");
	}
	public function setLastLoginAttemptDate (?\DateTime $LastLoginAttemptDate = null) : self {
		$this->set("LastLoginAttemptDate", $LastLoginAttemptDate);
		return $this;
	}
	public function getLastLoginAttemptDate () : ?\DateTime {
		return $this->get("LastLoginAttemptDate", "\\DateTime");
	}
	public function setInvalidPasswordAttempts (?int $InvalidPasswordAttempts = null) : self {
		$this->set("InvalidPasswordAttempts", $InvalidPasswordAttempts);
		return $this;
	}
	public function getInvalidPasswordAttempts () : ?int {
		return $this->get("InvalidPasswordAttempts", "int");
	}
	public function setLastUpdated (?\DateTime $LastUpdated = null) : self {
		$this->set("LastUpdated", $LastUpdated);
		return $this;
	}
	public function getLastUpdated () : ?\DateTime {
		return $this->get("LastUpdated", "\\DateTime");
	}
}