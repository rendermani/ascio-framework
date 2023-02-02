<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateCustomerReference

namespace ascio\service\v3;
use ascio\db\v3\UpdateCustomerReferenceDb;
use ascio\api\v3\UpdateCustomerReferenceApi;
use ascio\base\v3\RequestRootElement;


class UpdateCustomerReference extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\UpdateCustomerReferenceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\UpdateCustomerReferenceRequest {
		return $this->get("request", "\\ascio\\v3\\UpdateCustomerReferenceRequest");
	}
	public function createRequest () : \ascio\v3\UpdateCustomerReferenceRequest {
		return $this->create ("request", "\\ascio\\v3\\UpdateCustomerReferenceRequest");
	}
}