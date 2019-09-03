<?php

// XSLT-WSDL-Client. Generated PHP class of GetContact

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetContactDb;
use ascio\api\v2\GetContactApi;


abstract class GetContact extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "contactHandle"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $contactHandle;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setContactHandle (?string $contactHandle = null) : self {
		$this->set("contactHandle", $contactHandle);
		return $this;
	}
	public function getContactHandle () : ?string {
		return $this->get("contactHandle", "string");
	}
}