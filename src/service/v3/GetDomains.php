<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomains

namespace ascio\service\v3;
use ascio\db\v3\GetDomainsDb;
use ascio\api\v3\GetDomainsApi;
use ascio\base\v3\RequestRootElement;


class GetDomains extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetDomainsRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetDomainsRequest {
		return $this->get("request", "\\ascio\\v3\\GetDomainsRequest");
	}
	public function createRequest () : \ascio\v3\GetDomainsRequest {
		return $this->create ("request", "\\ascio\\v3\\GetDomainsRequest");
	}
}