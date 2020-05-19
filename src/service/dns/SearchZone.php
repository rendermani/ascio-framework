<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZone

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\SearchZoneDb;
use ascio\api\dns\SearchZoneApi;


class SearchZone extends RequestRootElement  {

	protected $_apiProperties=["searchZoneClauses", "zoneInfoLevel"];
	protected $_apiObjects=["searchZoneClauses"];
	protected $searchZoneClauses;
	protected $zoneInfoLevel;

	public function setSearchZoneClauses (?\ascio\dns\ArrayOfSearchZoneClause $searchZoneClauses = null) : self {
		$this->set("searchZoneClauses", $searchZoneClauses);
		return $this;
	}
	public function getSearchZoneClauses () : ?\ascio\dns\ArrayOfSearchZoneClause {
		return $this->get("searchZoneClauses", "\\ascio\\dns\\ArrayOfSearchZoneClause");
	}
	public function createSearchZoneClauses () : \ascio\dns\ArrayOfSearchZoneClause {
		return $this->create ("searchZoneClauses", "\\ascio\\dns\\ArrayOfSearchZoneClause");
	}
	public function setZoneInfoLevel (?string $zoneInfoLevel = null) : self {
		$this->set("zoneInfoLevel", $zoneInfoLevel);
		return $this;
	}
	public function getZoneInfoLevel () : ?string {
		return $this->get("zoneInfoLevel", "string");
	}
}