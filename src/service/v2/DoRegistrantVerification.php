<?php

// XSLT-WSDL-Client. Generated PHP class of DoRegistrantVerification

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\DoRegistrantVerificationDb;
use ascio\api\v2\DoRegistrantVerificationApi;


class DoRegistrantVerification extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "value"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $value;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\DoRegistrantVerification {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setValue (?string $value = null) : \ascio\v2\DoRegistrantVerification {
		$this->set("value", $value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("value", "string");
	}
}