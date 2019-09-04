<?php

// XSLT-WSDL-Client. Generated PHP class of SearchZoneNamesResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\SearchZoneNamesResponseDb;
use ascio\api\dns\SearchZoneNamesResponseApi;


abstract class SearchZoneNamesResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchZoneNamesResult", "zoneNames"];
	protected $_apiObjects=["SearchZoneNamesResult", "zoneNames"];
	protected $SearchZoneNamesResult;
	protected $zoneNames;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchZoneNamesResult (?\ascio\dns\Response $SearchZoneNamesResult = null) : self {
		$this->set("SearchZoneNamesResult", $SearchZoneNamesResult);
		return $this;
	}
	public function getSearchZoneNamesResult () : ?\ascio\dns\Response {
		return $this->get("SearchZoneNamesResult", "\\ascio\\dns\\Response");
	}
	public function createSearchZoneNamesResult () : \ascio\dns\Response {
		return $this->create ("SearchZoneNamesResult", "\\ascio\\dns\\Response");
	}
	public function setZoneNames (?\ascio\dns\ArrayOfstring $zoneNames = null) : self {
		$this->set("zoneNames", $zoneNames);
		return $this;
	}
	public function getZoneNames () : ?\ascio\dns\ArrayOfstring {
		return $this->get("zoneNames", "\\ascio\\dns\\ArrayOfstring");
	}
	public function createZoneNames () : \ascio\dns\ArrayOfstring {
		return $this->create ("zoneNames", "\\ascio\\dns\\ArrayOfstring");
	}
}