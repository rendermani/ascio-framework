<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRegistrant

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\CreateRegistrantDb;
use ascio\api\v3\CreateRegistrantApi;


class CreateRegistrant extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateRegistrantRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateRegistrantRequest {
		return $this->get("request", "\\ascio\\v3\\CreateRegistrantRequest");
	}
	public function createRequest () : \ascio\v3\CreateRegistrantRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateRegistrantRequest");
	}
}