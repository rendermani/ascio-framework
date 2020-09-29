<?php

// XSLT-WSDL-Client. Generated PHP class of CreateContact

namespace ascio\service\v2;
use ascio\db\v2\CreateContactDb;
use ascio\api\v2\CreateContactApi;
use ascio\base\v2\RequestRootElement;


class CreateContact extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "contact"];
	protected $_apiObjects=["contact"];
	protected $sessionId;
	protected $contact;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setContact (?\ascio\v2\Contact $contact = null) : self {
		$this->set("contact", $contact);
		return $this;
	}
	public function getContact () : ?\ascio\v2\Contact {
		return $this->get("contact", "\\ascio\\v2\\Contact");
	}
	public function createContact () : \ascio\v2\Contact {
		return $this->create ("contact", "\\ascio\\v2\\Contact");
	}
}