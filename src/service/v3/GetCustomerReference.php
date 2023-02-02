<?php

// XSLT-WSDL-Client. Generated PHP class of GetCustomerReference

namespace ascio\service\v3;
use ascio\db\v3\GetCustomerReferenceDb;
use ascio\api\v3\GetCustomerReferenceApi;
use ascio\base\v3\RequestRootElement;


class GetCustomerReference extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetCustomerReferenceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetCustomerReferenceRequest {
		return $this->get("request", "\\ascio\\v3\\GetCustomerReferenceRequest");
	}
	public function createRequest () : \ascio\v3\GetCustomerReferenceRequest {
		return $this->create ("request", "\\ascio\\v3\\GetCustomerReferenceRequest");
	}
}