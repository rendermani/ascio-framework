<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationStatus

namespace ascio\service\v2;
use ascio\db\v2\GetRegistrantVerificationStatusDb;
use ascio\api\v2\GetRegistrantVerificationStatusApi;
use ascio\base\v2\RequestRootElement;


class GetRegistrantVerificationStatus extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "value"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $value;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setValue (?string $value = null) : self {
		$this->set("value", $value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("value", "string");
	}
}