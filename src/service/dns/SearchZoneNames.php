<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZoneNames

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\SearchZoneNamesDb;
use ascio\api\dns\SearchZoneNamesApi;


abstract class SearchZoneNames extends RequestRootElement  {

	protected $_apiProperties=["searchZoneClauses"];
	protected $_apiObjects=["searchZoneClauses"];
	protected $searchZoneClauses;

	/**
	* Getters and setters for API-Properties
	*/
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