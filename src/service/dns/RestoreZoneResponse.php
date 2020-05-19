<?php

// XSLT-WSDL-Client. Generated PHP class of RestoreZoneResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\RestoreZoneResponseDb;
use ascio\api\dns\RestoreZoneResponseApi;


class RestoreZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["RestoreZoneResult", "zone"];
	protected $_apiObjects=["RestoreZoneResult", "zone"];
	protected $RestoreZoneResult;
	protected $zone;

	public function setRestoreZoneResult (?\ascio\dns\Response $RestoreZoneResult = null) : self {
		$this->set("RestoreZoneResult", $RestoreZoneResult);
		return $this;
	}
	public function getRestoreZoneResult () : ?\ascio\dns\Response {
		return $this->get("RestoreZoneResult", "\\ascio\\dns\\Response");
	}
	public function createRestoreZoneResult () : \ascio\dns\Response {
		return $this->create ("RestoreZoneResult", "\\ascio\\dns\\Response");
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