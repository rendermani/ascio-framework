<?php

// XSLT-WSDL-Client. Generated PHP class of SetZoneOwner

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\SetZoneOwnerDb;
use ascio\api\dns\SetZoneOwnerApi;


class SetZoneOwner extends RequestRootElement  {

	protected $_apiProperties=["zoneName", "owner"];
	protected $_apiObjects=[];
	protected $zoneName;
	protected $owner;

	public function setZoneName (?string $zoneName = null) : \ascio\dns\SetZoneOwner {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
	public function setOwner (?string $owner = null) : \ascio\dns\SetZoneOwner {
		$this->set("owner", $owner);
		return $this;
	}
	public function getOwner () : ?string {
		return $this->get("owner", "string");
	}
}