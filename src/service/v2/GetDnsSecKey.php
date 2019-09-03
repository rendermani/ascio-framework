<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKey

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetDnsSecKeyDb;
use ascio\api\v2\GetDnsSecKeyApi;


abstract class GetDnsSecKey extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "dnsSecKeyHandle"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $dnsSecKeyHandle;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setDnsSecKeyHandle (?string $dnsSecKeyHandle = null) : self {
		$this->set("dnsSecKeyHandle", $dnsSecKeyHandle);
		return $this;
	}
	public function getDnsSecKeyHandle () : ?string {
		return $this->get("dnsSecKeyHandle", "string");
	}
}