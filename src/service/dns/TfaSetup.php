<?php

// XSLT-WSDL-Client. Generated PHP class of TfaSetup

namespace ascio\service\dns;
use ascio\db\dns\TfaSetupDb;
use ascio\api\dns\TfaSetupApi;
use ascio\base\dns\Base;


class TfaSetup extends Base  {

	protected $_apiProperties=["QrCodeImageString", "QrCodeUrl", "SecretKey", "UserName"];
	protected $_apiObjects=[];
	protected $QrCodeImageString;
	protected $QrCodeUrl;
	protected $SecretKey;
	protected $UserName;

	public function setQrCodeImageString (?string $QrCodeImageString = null) : self {
		$this->set("QrCodeImageString", $QrCodeImageString);
		return $this;
	}
	public function getQrCodeImageString () : ?string {
		return $this->get("QrCodeImageString", "string");
	}
	public function setQrCodeUrl (?string $QrCodeUrl = null) : self {
		$this->set("QrCodeUrl", $QrCodeUrl);
		return $this;
	}
	public function getQrCodeUrl () : ?string {
		return $this->get("QrCodeUrl", "string");
	}
	public function setSecretKey (?string $SecretKey = null) : self {
		$this->set("SecretKey", $SecretKey);
		return $this;
	}
	public function getSecretKey () : ?string {
		return $this->get("SecretKey", "string");
	}
	public function setUserName (?string $UserName = null) : self {
		$this->set("UserName", $UserName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("UserName", "string");
	}
}