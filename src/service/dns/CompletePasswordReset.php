<?php

// XSLT-WSDL-Client. Generated PHP class of CompletePasswordReset

namespace ascio\service\dns;
use ascio\db\dns\CompletePasswordResetDb;
use ascio\api\dns\CompletePasswordResetApi;
use ascio\base\dns\RequestRootElement;


class CompletePasswordReset extends RequestRootElement  {

	protected $_apiProperties=["resetToken", "userName", "password"];
	protected $_apiObjects=[];
	protected $resetToken;
	protected $userName;
	protected $password;

	public function setResetToken (?string $resetToken = null) : self {
		$this->set("resetToken", $resetToken);
		return $this;
	}
	public function getResetToken () : ?string {
		return $this->get("resetToken", "string");
	}
	public function setUserName (?string $userName = null) : self {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
	public function setPassword (?string $password = null) : self {
		$this->set("password", $password);
		return $this;
	}
	public function getPassword () : ?string {
		return $this->get("password", "string");
	}
}