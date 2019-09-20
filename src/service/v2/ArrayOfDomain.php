<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDomain

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfDomainDb;
use ascio\api\v2\ArrayOfDomainApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfDomain extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["Domain"];
	protected $_apiObjects=["Domain"];
	protected $Domain;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\Domain {
		return parent::current();
	}
	public function first() : \ascio\v2\Domain {
		return parent::first();
	}
	public function last() : \ascio\v2\Domain {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Domain {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setDomain (?Iterable $Domain = null) : self {
		$this->set("Domain", $Domain);
		return $this;
	}
	public function getDomain () : ?Iterable {
		return $this->get("Domain", "\\ascio\\v2\\Domain");
	}
	public function createDomain () : \ascio\v2\Domain {
		return $this->create ("Domain", "\\ascio\\v2\\Domain");
	}
	public function addDomain () : \ascio\v2\Domain {
		return $this->addItem(func_get_args(),"\\ascio\\v2\\Domain");
	}
	public function addDomains ($array) : self {
		return $this->add(func_get_args());
	}
}