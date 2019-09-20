<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfContact

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfContactDb;
use ascio\api\v2\ArrayOfContactApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfContact extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["Contact"];
	protected $_apiObjects=["Contact"];
	protected $Contact;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\Contact {
		return parent::current();
	}
	public function first() : \ascio\v2\Contact {
		return parent::first();
	}
	public function last() : \ascio\v2\Contact {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Contact {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
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
	public function addContact () : \ascio\v2\Contact {
		return $this->addItem(func_get_args(),"\\ascio\\v2\\Contact");
	}
	public function addContacts ($array) : self {
		return $this->add(func_get_args());
	}
}