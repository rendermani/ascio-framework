<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationRequest

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantVerificationRequestDb;
use ascio\api\v3\GetRegistrantVerificationRequestApi;
use ascio\base\v3\Base;


class GetRegistrantVerificationRequest extends Base  {

	protected $_apiProperties=["Email"];
	protected $_apiObjects=[];
	protected $Email;

	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
	}
}