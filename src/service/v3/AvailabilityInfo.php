<?php

// XSLT-WSDL-Client. Generated PHP class of AvailabilityInfo

namespace ascio\service\v3;
use ascio\db\v3\AvailabilityInfoDb;
use ascio\api\v3\AvailabilityInfoApi;
use ascio\base\v3\RequestRootElement;


class AvailabilityInfo extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\AvailabilityInfoRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\AvailabilityInfoRequest {
		return $this->get("request", "\\ascio\\v3\\AvailabilityInfoRequest");
	}
	public function createRequest () : \ascio\v3\AvailabilityInfoRequest {
		return $this->create ("request", "\\ascio\\v3\\AvailabilityInfoRequest");
	}
}