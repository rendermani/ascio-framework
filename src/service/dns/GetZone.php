<?php

// XSLT-WSDL-Client. Generated PHP class of GetZone

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\GetZoneDb;
use ascio\api\dns\GetZoneApi;


class GetZone extends RequestRootElement  {

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