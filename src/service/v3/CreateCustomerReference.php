<?php

// XSLT-WSDL-Client. Generated PHP class of CreateCustomerReference

namespace ascio\service\v3;
use ascio\db\v3\CreateCustomerReferenceDb;
use ascio\api\v3\CreateCustomerReferenceApi;
use ascio\base\v3\RequestRootElement;


class CreateCustomerReference extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateCustomerReferenceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateCustomerReferenceRequest {
		return $this->get("request", "\\ascio\\v3\\CreateCustomerReferenceRequest");
	}
	public function createRequest () : \ascio\v3\CreateCustomerReferenceRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateCustomerReferenceRequest");
	}
}