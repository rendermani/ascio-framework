<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomain

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetDomainDb;
use ascio\api\v2\GetDomainApi;


class GetDomain extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "domainHandle"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $domainHandle;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\GetDomain {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setDomainHandle (?string $domainHandle = null) : \ascio\v2\GetDomain {
		$this->set("domainHandle", $domainHandle);
		return $this;
	}
	public function getDomainHandle () : ?string {
		return $this->get("domainHandle", "string");
	}
}