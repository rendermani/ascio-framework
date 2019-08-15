<?php

// XSLT-WSDL-Client. Generated PHP class of CreateContactResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateContactResponseDb;
use ascio\api\v2\CreateContactResponseApi;


class CreateContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateContactResult", "contact"];
	protected $_apiObjects=["CreateContactResult", "contact"];
	protected $CreateContactResult;
	protected $contact;

	public function setCreateContactResult (?\ascio\v2\Response $CreateContactResult = null) : self {
		$this->set("CreateContactResult", $CreateContactResult);
		return $this;
	}
	public function getCreateContactResult () : ?\ascio\v2\Response {
		return $this->get("CreateContactResult", "\\ascio\\v2\\Response");
	}
	public function createCreateContactResult () : \ascio\v2\Response {
		return $this->create ("CreateContactResult", "\\ascio\\v2\\Response");
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