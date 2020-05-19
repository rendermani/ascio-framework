<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeyResponse

namespace ascio\service\v3;
use ascio\base\v3\ResponseRootElement;
use ascio\db\v3\GetDnsSecKeyResponseDb;
use ascio\api\v3\GetDnsSecKeyResponseApi;


class GetDnsSecKeyResponse extends ResponseRootElement  {

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