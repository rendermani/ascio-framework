<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDomain

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfDomainDb;
use ascio\api\v2\ArrayOfDomainApi;
use ascio\base\v2\ArrayBase;


class ArrayOfDomain extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Domain"];
	protected $_apiObjects=["Domain"];
	protected $Domain;

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
	public function addDomain ($item = null) : \ascio\v2\Domain {
		return $this->addItem("Domain","\\ascio\\v2\\Domain",func_get_args());
	}
}