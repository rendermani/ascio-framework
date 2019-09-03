<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomainResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetDomainResponseDb;
use ascio\api\v2\GetDomainResponseApi;


abstract class GetDomainResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetDomainResult", "domain"];
	protected $_apiObjects=["GetDomainResult", "domain"];
	protected $GetDomainResult;
	protected $domain;

	public function setGetDomainResult (?\ascio\v2\Response $GetDomainResult = null) : self {
		$this->set("GetDomainResult", $GetDomainResult);
		return $this;
	}
	public function getGetDomainResult () : ?\ascio\v2\Response {
		return $this->get("GetDomainResult", "\\ascio\\v2\\Response");
	}
	public function createGetDomainResult () : \ascio\v2\Response {
		return $this->create ("GetDomainResult", "\\ascio\\v2\\Response");
	}
	public function setDomain (?\ascio\v2\Domain $domain = null) : self {
		$this->set("domain", $domain);
		return $this;
	}
	public function getDomain () : ?\ascio\v2\Domain {
		return $this->get("domain", "\\ascio\\v2\\Domain");
	}
	public function createDomain () : \ascio\v2\Domain {
		return $this->create ("domain", "\\ascio\\v2\\Domain");
	}
}