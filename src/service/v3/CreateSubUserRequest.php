<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSubUserRequest

namespace ascio\service\v3;
use ascio\db\v3\CreateSubUserRequestDb;
use ascio\api\v3\CreateSubUserRequestApi;
use ascio\base\v3\Base;


class CreateSubUserRequest extends Base  {

	protected $_apiProperties=["SubUser", "Password"];
	protected $_apiObjects=["SubUser"];
	protected $SubUser;
	protected $Password;

	public function setSubUser (?\ascio\v3\User $SubUser = null) : self {
		$this->set("SubUser", $SubUser);
		return $this;
	}
	public function getSubUser () : ?\ascio\v3\User {
		return $this->get("SubUser", "\\ascio\\v3\\User");
	}
	public function createSubUser () : \ascio\v3\User {
		return $this->create ("SubUser", "\\ascio\\v3\\User");
	}
	public function setPassword (?string $Password = null) : self {
		$this->set("Password", $Password);
		return $this;
	}
	public function getPassword () : ?string {
		return $this->get("Password", "string");
	}
}