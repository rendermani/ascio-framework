<?php

// XSLT-WSDL-Client. Generated PHP class of GetZoneResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\GetZoneResponseDb;
use ascio\api\dns\GetZoneResponseApi;


abstract class GetZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetZoneResult", "zone"];
	protected $_apiObjects=["GetZoneResult", "zone"];
	protected $GetZoneResult;
	protected $zone;

	public function setGetZoneResult (?\ascio\dns\Response $GetZoneResult = null) : self {
		$this->set("GetZoneResult", $GetZoneResult);
		return $this;
	}
	public function getGetZoneResult () : ?\ascio\dns\Response {
		return $this->get("GetZoneResult", "\\ascio\\dns\\Response");
	}
	public function createGetZoneResult () : \ascio\dns\Response {
		return $this->create ("GetZoneResult", "\\ascio\\dns\\Response");
	}
	public function setZone (?\ascio\dns\Zone $zone = null) : self {
		$this->set("zone", $zone);
		return $this;
	}
	public function getZone () : ?\ascio\dns\Zone {
		return $this->get("zone", "\\ascio\\dns\\Zone");
	}
	public function createZone () : \ascio\dns\Zone {
		return $this->create ("zone", "\\ascio\\dns\\Zone");
	}
}