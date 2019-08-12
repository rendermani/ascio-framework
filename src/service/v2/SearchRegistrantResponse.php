<?php

// XSLT-WSDL-Client. Generated PHP class of SearchRegistrantResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\SearchRegistrantResponseDb;
use ascio\api\v2\SearchRegistrantResponseApi;


class SearchRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchRegistrantResult", "registrants"];
	protected $_apiObjects=["SearchRegistrantResult", "registrants"];
	protected $SearchRegistrantResult;
	protected $registrants;

	public function setSearchRegistrantResult (?\ascio\v2\Response $SearchRegistrantResult = null) : \ascio\v2\SearchRegistrantResponse {
		$this->set("SearchRegistrantResult", $SearchRegistrantResult);
		return $this;
	}
	public function getSearchRegistrantResult () : ?\ascio\v2\Response {
		return $this->get("SearchRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function createSearchRegistrantResult () : \ascio\v2\Response {
		return $this->create ("SearchRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function setRegistrants (?\ascio\v2\ArrayOfRegistrant $registrants = null) : \ascio\v2\SearchRegistrantResponse {
		$this->set("registrants", $registrants);
		return $this;
	}
	public function getRegistrants () : ?\ascio\v2\ArrayOfRegistrant {
		return $this->get("registrants", "\\ascio\\v2\\ArrayOfRegistrant");
	}
	public function createRegistrants () : \ascio\v2\ArrayOfRegistrant {
		return $this->create ("registrants", "\\ascio\\v2\\ArrayOfRegistrant");
	}
}