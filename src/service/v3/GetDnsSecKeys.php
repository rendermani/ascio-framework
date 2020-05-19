<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeys

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetDnsSecKeysDb;
use ascio\api\v3\GetDnsSecKeysApi;


class GetDnsSecKeys extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetDnsSecKeysRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetDnsSecKeysRequest {
		return $this->get("request", "\\ascio\\v3\\GetDnsSecKeysRequest");
	}
	public function createRequest () : \ascio\v3\GetDnsSecKeysRequest {
		return $this->create ("request", "\\ascio\\v3\\GetDnsSecKeysRequest");
	}
}