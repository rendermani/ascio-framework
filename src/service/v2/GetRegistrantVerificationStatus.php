<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationStatus

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetRegistrantVerificationStatusDb;
use ascio\api\v2\GetRegistrantVerificationStatusApi;


class GetRegistrantVerificationStatus extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "value"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $value;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\GetRegistrantVerificationStatus {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setValue (?string $value = null) : \ascio\v2\GetRegistrantVerificationStatus {
		$this->set("value", $value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("value", "string");
	}
}