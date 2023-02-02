<?php

// XSLT-WSDL-Client. Generated PHP class of SetCustomerReferences

namespace ascio\service\v3;
use ascio\db\v3\SetCustomerReferencesDb;
use ascio\api\v3\SetCustomerReferencesApi;
use ascio\base\v3\RequestRootElement;


class SetCustomerReferences extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\SetCustomerReferencesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\SetCustomerReferencesRequest {
		return $this->get("request", "\\ascio\\v3\\SetCustomerReferencesRequest");
	}
	public function createRequest () : \ascio\v3\SetCustomerReferencesRequest {
		return $this->create ("request", "\\ascio\\v3\\SetCustomerReferencesRequest");
	}
}