<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDnsSecKey

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfDnsSecKeyDb;
use ascio\api\v2\ArrayOfDnsSecKeyApi;


class ArrayOfDnsSecKey extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DnsSecKey"];
	protected $_apiObjects=["DnsSecKey"];
	protected $DnsSecKey;

	public function setDnsSecKey (?Iterable $DnsSecKey = null) : \ascio\v2\ArrayOfDnsSecKey {
		$this->set("DnsSecKey", $DnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?Iterable {
		return $this->get("DnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
	public function addDnsSecKey () : ?\ascio\v2\DnsSecKey {
		return $this->add("DnsSecKey","\\ascio\\v2\\DnsSecKey",func_get_args());
	}
}