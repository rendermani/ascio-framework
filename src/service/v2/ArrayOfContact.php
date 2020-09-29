<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfContact

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfContactDb;
use ascio\api\v2\ArrayOfContactApi;
use ascio\base\v2\ArrayBase;


class ArrayOfContact extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Contact"];
	protected $_apiObjects=["Contact"];
	protected $Contact;

	public function setContact (?Iterable $Contact = null) : self {
		$this->set("Contact", $Contact);
		return $this;
	}
	public function getContact () : ?Iterable {
		return $this->get("Contact", "\\ascio\\v2\\Contact");
	}
	public function createContact () : \ascio\v2\Contact {
		return $this->create ("Contact", "\\ascio\\v2\\Contact");
	}
	public function addContact ($item = null) : \ascio\v2\Contact {
		return $this->addItem("Contact","\\ascio\\v2\\Contact",func_get_args());
	}
}