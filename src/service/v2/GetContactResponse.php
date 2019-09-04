<?php

// XSLT-WSDL-Client. Generated PHP class of GetContactResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetContactResponseDb;
use ascio\api\v2\GetContactResponseApi;


abstract class GetContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetContactResult", "contact"];
	protected $_apiObjects=["GetContactResult", "contact"];
	protected $GetContactResult;
	protected $contact;

	/**
	* Getters and setters for API-Properties
	*/
	public function setGetContactResult (?\ascio\v2\Response $GetContactResult = null) : self {
		$this->set("GetContactResult", $GetContactResult);
		return $this;
	}
	public function getGetContactResult () : ?\ascio\v2\Response {
		return $this->get("GetContactResult", "\\ascio\\v2\\Response");
	}
	public function createGetContactResult () : \ascio\v2\Response {
		return $this->create ("GetContactResult", "\\ascio\\v2\\Response");
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