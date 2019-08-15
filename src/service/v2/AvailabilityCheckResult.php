<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityCheckResult

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\AvailabilityCheckResultDb;
use ascio\api\v2\AvailabilityCheckResultApi;


class AvailabilityCheckResult extends Base  {

	protected $_apiProperties=["DomainName", "Quality", "StatusCode", "StatusMessage"];
	protected $_apiObjects=[];
	protected $DomainName;
	protected $Quality;
	protected $StatusCode;
	protected $StatusMessage;

	public function setDomainName (?string $DomainName = null) : self {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setQuality (?string $Quality = null) : self {
		$this->set("Quality", $Quality);
		return $this;
	}
	public function getQuality () : ?string {
		return $this->get("Quality", "string");
	}
	public function setStatusCode (?int $StatusCode = null) : self {
		$this->set("StatusCode", $StatusCode);
		return $this;
	}
	public function getStatusCode () : ?int {
		return $this->get("StatusCode", "int");
	}
	public function setStatusMessage (?string $StatusMessage = null) : self {
		$this->set("StatusMessage", $StatusMessage);
		return $this;
	}
	public function getStatusMessage () : ?string {
		return $this->get("StatusMessage", "string");
	}
}