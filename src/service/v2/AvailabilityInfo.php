<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityInfo

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\AvailabilityInfoDb;
use ascio\api\v2\AvailabilityInfoApi;


class AvailabilityInfo extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "domainName", "quality"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $domainName;
	protected $quality;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\AvailabilityInfo {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setDomainName (?string $domainName = null) : \ascio\v2\AvailabilityInfo {
		$this->set("domainName", $domainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("domainName", "string");
	}
	public function setQuality (?string $quality = null) : \ascio\v2\AvailabilityInfo {
		$this->set("quality", $quality);
		return $this;
	}
	public function getQuality () : ?string {
		return $this->get("quality", "string");
	}
}