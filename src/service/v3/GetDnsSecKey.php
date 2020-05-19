<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKey

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetDnsSecKeyDb;
use ascio\api\v3\GetDnsSecKeyApi;


class GetDnsSecKey extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetDnsSecKeyRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetDnsSecKeyRequest {
		return $this->get("request", "\\ascio\\v3\\GetDnsSecKeyRequest");
	}
	public function createRequest () : \ascio\v3\GetDnsSecKeyRequest {
		return $this->create ("request", "\\ascio\\v3\\GetDnsSecKeyRequest");
	}
}