<?php

// XSLT-WSDL-Client. Generated PHP class of GetZoneLog

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\GetZoneLogDb;
use ascio\api\dns\GetZoneLogApi;


class GetZoneLog extends RequestRootElement  {

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