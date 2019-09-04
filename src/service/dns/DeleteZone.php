<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteZone

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\DeleteZoneDb;
use ascio\api\dns\DeleteZoneApi;


abstract class DeleteZone extends RequestRootElement  {

	protected $_apiProperties=["zoneName"];
	protected $_apiObjects=[];
	protected $zoneName;

	/**
	* Getters and setters for API-Properties
	*/
	public function setZoneName (?string $zoneName = null) : self {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
}