<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomain

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetDomainDb;
use ascio\api\v3\GetDomainApi;


class GetDomain extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetDomainRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetDomainRequest {
		return $this->get("request", "\\ascio\\v3\\GetDomainRequest");
	}
	public function createRequest () : \ascio\v3\GetDomainRequest {
		return $this->create ("request", "\\ascio\\v3\\GetDomainRequest");
	}
}