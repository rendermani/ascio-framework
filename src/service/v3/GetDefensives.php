<?php

// XSLT-WSDL-Client. Generated PHP class of GetDefensives

namespace ascio\service\v3;
use ascio\db\v3\GetDefensivesDb;
use ascio\api\v3\GetDefensivesApi;
use ascio\base\v3\RequestRootElement;


class GetDefensives extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetDefensivesRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetDefensivesRequest {
		return $this->get("request", "\\ascio\\v3\\GetDefensivesRequest");
	}
	public function createRequest () : \ascio\v3\GetDefensivesRequest {
		return $this->create ("request", "\\ascio\\v3\\GetDefensivesRequest");
	}
}