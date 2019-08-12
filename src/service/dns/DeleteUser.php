<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteUser

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\DeleteUserDb;
use ascio\api\dns\DeleteUserApi;


class DeleteUser extends RequestRootElement  {

	protected $_apiProperties=["userName"];
	protected $_apiObjects=[];
	protected $userName;

	public function setUserName (?string $userName = null) : \ascio\dns\DeleteUser {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
}