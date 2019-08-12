<?php

// XSLT-WSDL-Client. Generated PHP class of GetUser

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\GetUserDb;
use ascio\api\dns\GetUserApi;


class GetUser extends RequestRootElement  {

	protected $_apiProperties=["userName"];
	protected $_apiObjects=[];
	protected $userName;

	public function setUserName (?string $userName = null) : \ascio\dns\GetUser {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
}