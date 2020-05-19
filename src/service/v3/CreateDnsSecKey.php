<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDnsSecKey

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\CreateDnsSecKeyDb;
use ascio\api\v3\CreateDnsSecKeyApi;


class CreateDnsSecKey extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateDnsSecKeyRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateDnsSecKeyRequest {
		return $this->get("request", "\\ascio\\v3\\CreateDnsSecKeyRequest");
	}
	public function createRequest () : \ascio\v3\CreateDnsSecKeyRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateDnsSecKeyRequest");
	}
}