<?php

// XSLT-WSDL-Client. Generated PHP class of RestoreZone

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\RestoreZoneDb;
use ascio\api\dns\RestoreZoneApi;


class RestoreZone extends RequestRootElement  {

	protected $_apiProperties=["zoneName"];
	protected $_apiObjects=[];
	protected $zoneName;

	public function setZoneName (?string $zoneName = null) : \ascio\dns\RestoreZone {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
}