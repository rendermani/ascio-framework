<?php

// XSLT-WSDL-Client. Generated PHP class of SearchDomainResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\SearchDomainResponseDb;
use ascio\api\v2\SearchDomainResponseApi;


abstract class SearchDomainResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchDomainResult", "domains"];
	protected $_apiObjects=["SearchDomainResult", "domains"];
	protected $SearchDomainResult;
	protected $domains;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchDomainResult (?\ascio\v2\Response $SearchDomainResult = null) : self {
		$this->set("SearchDomainResult", $SearchDomainResult);
		return $this;
	}
	public function getSearchDomainResult () : ?\ascio\v2\Response {
		return $this->get("SearchDomainResult", "\\ascio\\v2\\Response");
	}
	public function createSearchDomainResult () : \ascio\v2\Response {
		return $this->create ("SearchDomainResult", "\\ascio\\v2\\Response");
	}
	public function setDomains (?\ascio\v2\ArrayOfDomain $domains = null) : self {
		$this->set("domains", $domains);
		return $this;
	}
	public function getDomains () : ?\ascio\v2\ArrayOfDomain {
		return $this->get("domains", "\\ascio\\v2\\ArrayOfDomain");
	}
	public function createDomains () : \ascio\v2\ArrayOfDomain {
		return $this->create ("domains", "\\ascio\\v2\\ArrayOfDomain");
	}
}