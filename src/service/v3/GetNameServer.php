<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameServer

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetNameServerDb;
use ascio\api\v3\GetNameServerApi;


class GetNameServer extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetNameServerRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetNameServerRequest {
		return $this->get("request", "\\ascio\\v3\\GetNameServerRequest");
	}
	public function createRequest () : \ascio\v3\GetNameServerRequest {
		return $this->create ("request", "\\ascio\\v3\\GetNameServerRequest");
	}
}