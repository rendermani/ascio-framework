<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrant

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantDb;
use ascio\api\v3\GetRegistrantApi;
use ascio\base\v3\RequestRootElement;


class GetRegistrant extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetRegistrantRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetRegistrantRequest {
		return $this->get("request", "\\ascio\\v3\\GetRegistrantRequest");
	}
	public function createRequest () : \ascio\v3\GetRegistrantRequest {
		return $this->create ("request", "\\ascio\\v3\\GetRegistrantRequest");
	}
}