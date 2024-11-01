<?php

// XSLT-WSDL-Client. Generated PHP class of RestoreZone

namespace ascio\service\dns;
use ascio\db\dns\RestoreZoneDb;
use ascio\api\dns\RestoreZoneApi;
use ascio\base\dns\RequestRootElement;


class RestoreZone extends RequestRootElement  {

	protected $_apiProperties=["zoneName"];
	protected $_apiObjects=[];
	protected $zoneName;

	public function setZoneName (?string $zoneName = null) : self {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
}