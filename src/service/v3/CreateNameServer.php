<?php

// XSLT-WSDL-Client. Generated PHP class of CreateNameServer

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\CreateNameServerDb;
use ascio\api\v3\CreateNameServerApi;


class CreateNameServer extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateNameServerRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateNameServerRequest {
		return $this->get("request", "\\ascio\\v3\\CreateNameServerRequest");
	}
	public function createRequest () : \ascio\v3\CreateNameServerRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateNameServerRequest");
	}
}