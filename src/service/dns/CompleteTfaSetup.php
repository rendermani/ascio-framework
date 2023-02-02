<?php

// XSLT-WSDL-Client. Generated PHP class of CompleteTfaSetup

namespace ascio\service\dns;
use ascio\db\dns\CompleteTfaSetupDb;
use ascio\api\dns\CompleteTfaSetupApi;
use ascio\base\dns\RequestRootElement;


class CompleteTfaSetup extends RequestRootElement  {

	protected $_apiProperties=["secretKey", "tfaCode"];
	protected $_apiObjects=[];
	protected $secretKey;
	protected $tfaCode;

	public function setSecretKey (?string $secretKey = null) : self {
		$this->set("secretKey", $secretKey);
		return $this;
	}
	public function getSecretKey () : ?string {
		return $this->get("secretKey", "string");
	}
	public function setTfaCode (?string $tfaCode = null) : self {
		$this->set("tfaCode", $tfaCode);
		return $this;
	}
	public function getTfaCode () : ?string {
		return $this->get("tfaCode", "string");
	}
}