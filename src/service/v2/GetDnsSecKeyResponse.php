<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeyResponse

namespace ascio\service\v2;
use ascio\db\v2\GetDnsSecKeyResponseDb;
use ascio\api\v2\GetDnsSecKeyResponseApi;
use ascio\base\v2\ResponseRootElement;


class GetDnsSecKeyResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetDnsSecKeyResult", "dnsSecKey"];
	protected $_apiObjects=["GetDnsSecKeyResult", "dnsSecKey"];
	protected $GetDnsSecKeyResult;
	protected $dnsSecKey;

	public function setGetDnsSecKeyResult (?\ascio\v2\Response $GetDnsSecKeyResult = null) : self {
		$this->set("GetDnsSecKeyResult", $GetDnsSecKeyResult);
		return $this;
	}
	public function getGetDnsSecKeyResult () : ?\ascio\v2\Response {
		return $this->get("GetDnsSecKeyResult", "\\ascio\\v2\\Response");
	}
	public function createGetDnsSecKeyResult () : \ascio\v2\Response {
		return $this->create ("GetDnsSecKeyResult", "\\ascio\\v2\\Response");
	}
	public function setDnsSecKey (?\ascio\v2\DnsSecKey $dnsSecKey = null) : self {
		$this->set("dnsSecKey", $dnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?\ascio\v2\DnsSecKey {
		return $this->get("dnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v2\DnsSecKey {
		return $this->create ("dnsSecKey", "\\ascio\\v2\\DnsSecKey");
	}
}