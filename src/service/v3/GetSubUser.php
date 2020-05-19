<?php

// XSLT-WSDL-Client. Generated PHP class of GetSubUser

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetSubUserDb;
use ascio\api\v3\GetSubUserApi;


class GetSubUser extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSubUserRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSubUserRequest {
		return $this->get("request", "\\ascio\\v3\\GetSubUserRequest");
	}
	public function createRequest () : \ascio\v3\GetSubUserRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSubUserRequest");
	}
}