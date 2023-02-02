<?php

// XSLT-WSDL-Client. Generated PHP class of StartRegistrantVerificationRequest

namespace ascio\service\v3;
use ascio\db\v3\StartRegistrantVerificationRequestDb;
use ascio\api\v3\StartRegistrantVerificationRequestApi;
use ascio\base\v3\Base;


class StartRegistrantVerificationRequest extends Base  {

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