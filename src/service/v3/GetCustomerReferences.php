<?php

// XSLT-WSDL-Client. Generated PHP class of GetCustomerReferences

namespace ascio\service\v3;
use ascio\db\v3\GetCustomerReferencesDb;
use ascio\api\v3\GetCustomerReferencesApi;
use ascio\base\v3\RequestRootElement;


class GetCustomerReferences extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetCustomerReferencesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetCustomerReferencesRequest {
		return $this->get("request", "\\ascio\\v3\\GetCustomerReferencesRequest");
	}
	public function createRequest () : \ascio\v3\GetCustomerReferencesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetCustomerReferencesRequest");
	}
}