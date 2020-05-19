<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityInfoRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\AvailabilityInfoRequestDb;
use ascio\api\v3\AvailabilityInfoRequestApi;


class AvailabilityInfoRequest extends Base  {

	protected $_apiProperties=["DomainName", "Quality"];
	protected $_apiObjects=[];
	protected $DomainName;
	protected $Quality;

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
}