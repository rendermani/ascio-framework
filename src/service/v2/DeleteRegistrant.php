<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRegistrant

namespace ascio\service\v2;
use ascio\db\v2\DeleteRegistrantDb;
use ascio\api\v2\DeleteRegistrantApi;
use ascio\base\v2\RequestRootElement;


class DeleteRegistrant extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "registrantHandle"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $registrantHandle;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setRegistrantHandle (?string $registrantHandle = null) : self {
		$this->set("registrantHandle", $registrantHandle);
		return $this;
	}
	public function getRegistrantHandle () : ?string {
		return $this->get("registrantHandle", "string");
	}
}