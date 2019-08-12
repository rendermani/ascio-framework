<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZoneResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\SearchZoneResponseDb;
use ascio\api\dns\SearchZoneResponseApi;


class SearchZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchZoneResult", "zones"];
	protected $_apiObjects=["SearchZoneResult", "zones"];
	protected $SearchZoneResult;
	protected $zones;

	public function setSearchZoneResult (?\ascio\dns\Response $SearchZoneResult = null) : \ascio\dns\SearchZoneResponse {
		$this->set("SearchZoneResult", $SearchZoneResult);
		return $this;
	}
	public function getSearchZoneResult () : ?\ascio\dns\Response {
		return $this->get("SearchZoneResult", "\\ascio\\dns\\Response");
	}
	public function createSearchZoneResult () : \ascio\dns\Response {
		return $this->create ("SearchZoneResult", "\\ascio\\dns\\Response");
	}
	public function setZones (?\ascio\dns\ArrayOfZone $zones = null) : \ascio\dns\SearchZoneResponse {
		$this->set("zones", $zones);
		return $this;
	}
	public function getZones () : ?\ascio\dns\ArrayOfZone {
		return $this->get("zones", "\\ascio\\dns\\ArrayOfZone");
	}
	public function createZones () : \ascio\dns\ArrayOfZone {
		return $this->create ("zones", "\\ascio\\dns\\ArrayOfZone");
	}
}