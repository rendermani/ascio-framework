<?php

// XSLT-WSDL-Client. Generated PHP class of GetZoneLogResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\GetZoneLogResponseDb;
use ascio\api\dns\GetZoneLogResponseApi;


class GetZoneLogResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetZoneLogResult", "zoneLogEntries"];
	protected $_apiObjects=["GetZoneLogResult", "zoneLogEntries"];
	protected $GetZoneLogResult;
	protected $zoneLogEntries;

	public function setGetZoneLogResult (?\ascio\dns\Response $GetZoneLogResult = null) : \ascio\dns\GetZoneLogResponse {
		$this->set("GetZoneLogResult", $GetZoneLogResult);
		return $this;
	}
	public function getGetZoneLogResult () : ?\ascio\dns\Response {
		return $this->get("GetZoneLogResult", "\\ascio\\dns\\Response");
	}
	public function createGetZoneLogResult () : \ascio\dns\Response {
		return $this->create ("GetZoneLogResult", "\\ascio\\dns\\Response");
	}
	public function setZoneLogEntries (?\ascio\dns\ArrayOfZoneLogEntry $zoneLogEntries = null) : \ascio\dns\GetZoneLogResponse {
		$this->set("zoneLogEntries", $zoneLogEntries);
		return $this;
	}
	public function getZoneLogEntries () : ?\ascio\dns\ArrayOfZoneLogEntry {
		return $this->get("zoneLogEntries", "\\ascio\\dns\\ArrayOfZoneLogEntry");
	}
	public function createZoneLogEntries () : \ascio\dns\ArrayOfZoneLogEntry {
		return $this->create ("zoneLogEntries", "\\ascio\\dns\\ArrayOfZoneLogEntry");
	}
}