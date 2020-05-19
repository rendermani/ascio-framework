<?php

// XSLT-WSDL-Client. Generated PHP class of CreateContactRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\CreateContactRequestDb;
use ascio\api\v3\CreateContactRequestApi;


class CreateContactRequest extends Base  {

	protected $_apiProperties=["Contact"];
	protected $_apiObjects=["Contact"];
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