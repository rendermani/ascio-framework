<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZoneNames

namespace ascio\service\dns;
use ascio\db\dns\SearchZoneNamesDb;
use ascio\api\dns\SearchZoneNamesApi;
use ascio\base\dns\RequestRootElement;


class SearchZoneNames extends RequestRootElement  {

	protected $_apiProperties=["searchZoneClauses"];
	protected $_apiObjects=["searchZoneClauses"];
	protected $searchZoneClauses;

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
}