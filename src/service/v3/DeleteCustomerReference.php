<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteCustomerReference

namespace ascio\service\v3;
use ascio\db\v3\DeleteCustomerReferenceDb;
use ascio\api\v3\DeleteCustomerReferenceApi;
use ascio\base\v3\RequestRootElement;


class DeleteCustomerReference extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\DeleteCustomerReferenceRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\DeleteCustomerReferenceRequest {
		return $this->get("request", "\\ascio\\v3\\DeleteCustomerReferenceRequest");
	}
	public function createRequest () : \ascio\v3\DeleteCustomerReferenceRequest {
		return $this->create ("request", "\\ascio\\v3\\DeleteCustomerReferenceRequest");
	}
}