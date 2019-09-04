<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDnsSecKey

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfDnsSecKeyDb;
use ascio\api\v2\ArrayOfDnsSecKeyApi;


abstract class ArrayOfDnsSecKey extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DnsSecKey"];
	protected $_apiObjects=["DnsSecKey"];
	protected $DnsSecKey;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\DnsSecKey {
		return parent::current();
	}
	public function first() : \ascio\v2\DnsSecKey {
		return parent::first();
	}
	public function last() : \ascio\v2\DnsSecKey {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\DnsSecKey {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setDnsSecKey (?Iterable $DnsSecKey = null) : self {
		$this->set("DnsSecKey", $DnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?Iterable {
		return $this->get("DnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
	public function addDnsSecKey () : \ascio\v2\DnsSecKey {
		return $this->add("DnsSecKey","\\ascio\\v2\\DnsSecKey",func_get_args());
	}
}