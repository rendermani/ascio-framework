<?php

// XSLT-WSDL-Client. Generated PHP class of VerifyTotp

namespace ascio\service\dns;
use ascio\db\dns\VerifyTotpDb;
use ascio\api\dns\VerifyTotpApi;
use ascio\base\dns\RequestRootElement;


class VerifyTotp extends RequestRootElement  {

	protected $_apiProperties=["tfaCode"];
	protected $_apiObjects=[];
	protected $tfaCode;

	public function setTfaCode (?string $tfaCode = null) : self {
		$this->set("tfaCode", $tfaCode);
		return $this;
	}
	public function getTfaCode () : ?string {
		return $this->get("tfaCode", "string");
	}
}