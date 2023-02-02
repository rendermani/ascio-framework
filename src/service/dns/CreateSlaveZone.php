<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSlaveZone

namespace ascio\service\dns;
use ascio\db\dns\CreateSlaveZoneDb;
use ascio\api\dns\CreateSlaveZoneApi;
use ascio\base\dns\RequestRootElement;


class CreateSlaveZone extends RequestRootElement  {

	protected $_apiProperties=["zoneName", "owner", "masterIp"];
	protected $_apiObjects=[];
	protected $zoneName;
	protected $owner;
	protected $masterIp;

	public function setZoneName (?string $zoneName = null) : self {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
	public function setOwner (?string $owner = null) : self {
		$this->set("owner", $owner);
		return $this;
	}
	public function getOwner () : ?string {
		return $this->get("owner", "string");
	}
	public function setMasterIp (?string $masterIp = null) : self {
		$this->set("masterIp", $masterIp);
		return $this;
	}
	public function getMasterIp () : ?string {
		return $this->get("masterIp", "string");
	}
}