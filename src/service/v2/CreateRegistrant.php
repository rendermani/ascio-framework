<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRegistrant

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\CreateRegistrantDb;
use ascio\api\v2\CreateRegistrantApi;


abstract class CreateRegistrant extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "registrant"];
	protected $_apiObjects=["registrant"];
	protected $sessionId;
	protected $registrant;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setRegistrant (?\ascio\v2\Registrant $registrant = null) : self {
		$this->set("registrant", $registrant);
		return $this;
	}
	public function getRegistrant () : ?\ascio\v2\Registrant {
		return $this->get("registrant", "\\ascio\\v2\\Registrant");
	}
	public function createRegistrant () : \ascio\v2\Registrant {
		return $this->create ("registrant", "\\ascio\\v2\\Registrant");
	}
}