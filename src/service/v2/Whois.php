<?php

// XSLT-WSDL-Client. Generated PHP class of Whois

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\WhoisDb;
use ascio\api\v2\WhoisApi;


class Whois extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "domainName"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $domainName;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\Whois {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setDomainName (?string $domainName = null) : \ascio\v2\Whois {
		$this->set("domainName", $domainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("domainName", "string");
	}
}