<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDnsSecKey

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfDnsSecKeyDb;
use ascio\api\v2\ArrayOfDnsSecKeyApi;
use ascio\base\v2\ArrayBase;


class ArrayOfDnsSecKey extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DnsSecKey"];
	protected $_apiObjects=["DnsSecKey"];
	protected $DnsSecKey;

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
	public function addDnsSecKey ($item = null) : \ascio\v2\DnsSecKey {
		return $this->addItem("DnsSecKey","\\ascio\\v2\\DnsSecKey",func_get_args());
	}
}