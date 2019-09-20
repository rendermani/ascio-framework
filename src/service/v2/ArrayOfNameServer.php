<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfNameServer

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfNameServerDb;
use ascio\api\v2\ArrayOfNameServerApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfNameServer extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["NameServer"];
	protected $_apiObjects=["NameServer"];
	protected $NameServer;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\NameServer {
		return parent::current();
	}
	public function first() : \ascio\v2\NameServer {
		return parent::first();
	}
	public function last() : \ascio\v2\NameServer {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\NameServer {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setNameServer (?Iterable $NameServer = null) : self {
		$this->set("NameServer", $NameServer);
		return $this;
	}
	public function getNameServer () : ?Iterable {
		return $this->get("NameServer", "\\ascio\\v2\\NameServer");
	}
	public function createNameServer () : \ascio\v2\NameServer {
		return $this->create ("NameServer", "\\ascio\\v2\\NameServer");
	}
	public function addNameServer () : \ascio\v2\NameServer {
		return $this->addItem(func_get_args(),"\\ascio\\v2\\NameServer");
	}
	public function addNameServers ($array) : self {
		return $this->add(func_get_args());
	}
}