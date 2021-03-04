<?php

// XSLT-WSDL-Client. Generated PHP class of GetPremiumDomains

namespace ascio\service\v3;
use ascio\db\v3\GetPremiumDomainsDb;
use ascio\api\v3\GetPremiumDomainsApi;
use ascio\base\v3\RequestRootElement;


class GetPremiumDomains extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetPremiumDomainsRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetPremiumDomainsRequest {
		return $this->get("request", "\\ascio\\v3\\GetPremiumDomainsRequest");
	}
	public function createRequest () : \ascio\v3\GetPremiumDomainsRequest {
		return $this->create ("request", "\\ascio\\v3\\GetPremiumDomainsRequest");
	}
}