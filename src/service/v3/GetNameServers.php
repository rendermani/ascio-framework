<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameServers

namespace ascio\service\v3;
use ascio\db\v3\GetNameServersDb;
use ascio\api\v3\GetNameServersApi;
use ascio\base\v3\RequestRootElement;


class GetNameServers extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetNameServersRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetNameServersRequest {
		return $this->get("request", "\\ascio\\v3\\GetNameServersRequest");
	}
	public function createRequest () : \ascio\v3\GetNameServersRequest {
		return $this->create ("request", "\\ascio\\v3\\GetNameServersRequest");
	}
}