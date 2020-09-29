<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDnsSecKeyRequest

namespace ascio\service\v3;
use ascio\db\v3\CreateDnsSecKeyRequestDb;
use ascio\api\v3\CreateDnsSecKeyRequestApi;
use ascio\base\v3\Base;


class CreateDnsSecKeyRequest extends Base  {

	protected $_apiProperties=["DnsSecKey"];
	protected $_apiObjects=["DnsSecKey"];
	protected $DnsSecKey;

	public function setDnsSecKey (?\ascio\v3\DnsSecKey $DnsSecKey = null) : self {
		$this->set("DnsSecKey", $DnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
}