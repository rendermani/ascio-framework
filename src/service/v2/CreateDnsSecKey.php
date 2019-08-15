<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDnsSecKey

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\CreateDnsSecKeyDb;
use ascio\api\v2\CreateDnsSecKeyApi;


class CreateDnsSecKey extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "dnsSecKey"];
	protected $_apiObjects=["dnsSecKey"];
	protected $sessionId;
	protected $dnsSecKey;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
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