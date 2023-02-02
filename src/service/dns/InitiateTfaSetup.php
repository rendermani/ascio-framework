<?php

// XSLT-WSDL-Client. Generated PHP class of InitiateTfaSetup

namespace ascio\service\dns;
use ascio\db\dns\InitiateTfaSetupDb;
use ascio\api\dns\InitiateTfaSetupApi;
use ascio\base\dns\RequestRootElement;


class InitiateTfaSetup extends RequestRootElement  {

	protected $_apiProperties=["userName"];
	protected $_apiObjects=[];
	protected $userName;

	public function setUserName (?string $userName = null) : self {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
}