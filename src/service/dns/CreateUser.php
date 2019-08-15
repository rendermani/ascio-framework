<?php

// XSLT-WSDL-Client. Generated PHP class of CreateUser

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\CreateUserDb;
use ascio\api\dns\CreateUserApi;


class CreateUser extends RequestRootElement  {

	protected $_apiProperties=["user"];
	protected $_apiObjects=["user"];
	protected $user;

	public function setUser (?\ascio\dns\User $user = null) : self {
		$this->set("user", $user);
		return $this;
	}
	public function getUser () : ?\ascio\dns\User {
		return $this->get("user", "\\ascio\\dns\\User");
	}
	public function createUser () : \ascio\dns\User {
		return $this->create ("user", "\\ascio\\dns\\User");
	}
}