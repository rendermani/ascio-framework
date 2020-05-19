<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrants

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetRegistrantsDb;
use ascio\api\v3\GetRegistrantsApi;


class GetRegistrants extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetRegistrantsRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetRegistrantsRequest {
		return $this->get("request", "\\ascio\\v3\\GetRegistrantsRequest");
	}
	public function createRequest () : \ascio\v3\GetRegistrantsRequest {
		return $this->create ("request", "\\ascio\\v3\\GetRegistrantsRequest");
	}
}