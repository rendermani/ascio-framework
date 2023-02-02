<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateZoneType

namespace ascio\service\dns;
use ascio\db\dns\UpdateZoneTypeDb;
use ascio\api\dns\UpdateZoneTypeApi;
use ascio\base\dns\RequestRootElement;


class UpdateZoneType extends RequestRootElement  {

	protected $_apiProperties=["zoneName", "zoneType", "masterIp"];
	protected $_apiObjects=[];
	protected $zoneName;
	protected $zoneType;
	protected $masterIp;

	public function setZoneName (?string $zoneName = null) : self {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
	public function setZoneType (?string $zoneType = null) : self {
		$this->set("zoneType", $zoneType);
		return $this;
	}
	public function getZoneType () : ?string {
		return $this->get("zoneType", "string");
	}
	public function setMasterIp (?string $masterIp = null) : self {
		$this->set("masterIp", $masterIp);
		return $this;
	}
	public function getMasterIp () : ?string {
		return $this->get("masterIp", "string");
	}
}