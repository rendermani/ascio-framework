<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateUser

namespace ascio\service\dns;
use ascio\db\dns\UpdateUserDb;
use ascio\api\dns\UpdateUserApi;
use ascio\base\dns\RequestRootElement;


class UpdateUser extends RequestRootElement  {

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