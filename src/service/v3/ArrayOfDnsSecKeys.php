<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDnsSecKeys

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfDnsSecKeysDb;
use ascio\api\v3\ArrayOfDnsSecKeysApi;


class ArrayOfDnsSecKeys extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DnsSecKey"];
	protected $_apiObjects=["DnsSecKey"];
	protected $DnsSecKey;

	public function setDnsSecKey (?Iterable $DnsSecKey = null) : self {
		$this->set("DnsSecKey", $DnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?Iterable {
		return $this->get("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
	public function addDnsSecKey () : \ascio\v3\DnsSecKey {
		return $this->add("DnsSecKey","\\ascio\\v3\\DnsSecKey",func_get_args());
	}
}