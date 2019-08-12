<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityCheck

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\AvailabilityCheckDb;
use ascio\api\v2\AvailabilityCheckApi;


class AvailabilityCheck extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "domains", "tlds", "quality"];
	protected $_apiObjects=["domains", "tlds"];
	protected $sessionId;
	protected $domains;
	protected $tlds;
	protected $quality;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\AvailabilityCheck {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setDomains (?\ascio\v2\ArrayOfString $domains = null) : \ascio\v2\AvailabilityCheck {
		$this->set("domains", $domains);
		return $this;
	}
	public function getDomains () : ?\ascio\v2\ArrayOfString {
		return $this->get("domains", "\\ascio\\v2\\ArrayOfString");
	}
	public function createDomains () : \ascio\v2\ArrayOfString {
		return $this->create ("domains", "\\ascio\\v2\\ArrayOfString");
	}
	public function setTlds (?\ascio\v2\ArrayOfString $tlds = null) : \ascio\v2\AvailabilityCheck {
		$this->set("tlds", $tlds);
		return $this;
	}
	public function getTlds () : ?\ascio\v2\ArrayOfString {
		return $this->get("tlds", "\\ascio\\v2\\ArrayOfString");
	}
	public function createTlds () : \ascio\v2\ArrayOfString {
		return $this->create ("tlds", "\\ascio\\v2\\ArrayOfString");
	}
	public function setQuality (?string $quality = null) : \ascio\v2\AvailabilityCheck {
		$this->set("quality", $quality);
		return $this;
	}
	public function getQuality () : ?string {
		return $this->get("quality", "string");
	}
}