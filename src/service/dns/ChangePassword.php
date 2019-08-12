<?php

// XSLT-WSDL-Client. Generated PHP class of ChangePassword

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\ChangePasswordDb;
use ascio\api\dns\ChangePasswordApi;


class ChangePassword extends RequestRootElement  {

	protected $_apiProperties=["userName", "newPassword"];
	protected $_apiObjects=[];
	protected $userName;
	protected $newPassword;

	public function setUserName (?string $userName = null) : \ascio\dns\ChangePassword {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
	public function setNewPassword (?string $newPassword = null) : \ascio\dns\ChangePassword {
		$this->set("newPassword", $newPassword);
		return $this;
	}
	public function getNewPassword () : ?string {
		return $this->get("newPassword", "string");
	}
}