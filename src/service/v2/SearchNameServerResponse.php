<?php

// XSLT-WSDL-Client. Generated PHP class of SearchNameServerResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\SearchNameServerResponseDb;
use ascio\api\v2\SearchNameServerResponseApi;


abstract class SearchNameServerResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchNameServerResult", "nameServers"];
	protected $_apiObjects=["SearchNameServerResult", "nameServers"];
	protected $SearchNameServerResult;
	protected $nameServers;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchNameServerResult (?\ascio\v2\Response $SearchNameServerResult = null) : self {
		$this->set("SearchNameServerResult", $SearchNameServerResult);
		return $this;
	}
	public function getSearchNameServerResult () : ?\ascio\v2\Response {
		return $this->get("SearchNameServerResult", "\\ascio\\v2\\Response");
	}
	public function createSearchNameServerResult () : \ascio\v2\Response {
		return $this->create ("SearchNameServerResult", "\\ascio\\v2\\Response");
	}
	public function setNameServers (?\ascio\v2\ArrayOfNameServer $nameServers = null) : self {
		$this->set("nameServers", $nameServers);
		return $this;
	}
	public function getNameServers () : ?\ascio\v2\ArrayOfNameServer {
		return $this->get("nameServers", "\\ascio\\v2\\ArrayOfNameServer");
	}
	public function createNameServers () : \ascio\v2\ArrayOfNameServer {
		return $this->create ("nameServers", "\\ascio\\v2\\ArrayOfNameServer");
	}
}