<?php

// XSLT-WSDL-Client. Generated PHP class of CreateContactResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\CreateContactResponseDb;
use ascio\api\v3\CreateContactResponseApi;
use ascio\api\v3\AbstractResponseApi;


class CreateContactResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Contact"];
	protected $_apiObjects=["Errors", "Contact"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Contact;

	public function setContact (?\ascio\v3\Contact $Contact = null) : self {
		$this->set("Contact", $Contact);
		return $this;
	}
	public function getContact () : ?\ascio\v3\Contact {
		return $this->get("Contact", "\\ascio\\v3\\Contact");
	}
	public function createContact () : \ascio\v3\Contact {
		return $this->create ("Contact", "\\ascio\\v3\\Contact");
	}
}