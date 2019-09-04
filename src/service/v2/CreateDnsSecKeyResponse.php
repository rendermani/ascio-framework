<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDnsSecKeyResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateDnsSecKeyResponseDb;
use ascio\api\v2\CreateDnsSecKeyResponseApi;


abstract class CreateDnsSecKeyResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateDnsSecKeyResult", "dnsSecKey"];
	protected $_apiObjects=["CreateDnsSecKeyResult", "dnsSecKey"];
	protected $CreateDnsSecKeyResult;
	protected $dnsSecKey;

	/**
	* Getters and setters for API-Properties
	*/
	public function setCreateDnsSecKeyResult (?\ascio\v2\Response $CreateDnsSecKeyResult = null) : self {
		$this->set("CreateDnsSecKeyResult", $CreateDnsSecKeyResult);
		return $this;
	}
	public function getCreateDnsSecKeyResult () : ?\ascio\v2\Response {
		return $this->get("CreateDnsSecKeyResult", "\\ascio\\v2\\Response");
	}
	public function createCreateDnsSecKeyResult () : \ascio\v2\Response {
		return $this->create ("CreateDnsSecKeyResult", "\\ascio\\v2\\Response");
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