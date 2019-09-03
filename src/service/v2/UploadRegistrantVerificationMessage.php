<?php

// XSLT-WSDL-Client. Generated PHP class of UploadRegistrantVerificationMessage

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\UploadRegistrantVerificationMessageDb;
use ascio\api\v2\UploadRegistrantVerificationMessageApi;


abstract class UploadRegistrantVerificationMessage extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "value", "details"];
	protected $_apiObjects=["details"];
	protected $sessionId;
	protected $value;
	protected $details;

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
	public function setDetails (?\ascio\v2\RegistrantVerificationDetails $details = null) : self {
		$this->set("details", $details);
		return $this;
	}
	public function getDetails () : ?\ascio\v2\RegistrantVerificationDetails {
		return $this->get("details", "\\ascio\\v2\\RegistrantVerificationDetails");
	}
	public function createDetails () : \ascio\v2\RegistrantVerificationDetails {
		return $this->create ("details", "\\ascio\\v2\\RegistrantVerificationDetails");
	}
}