<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSubUser

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\CreateSubUserDb;
use ascio\api\v3\CreateSubUserApi;


class CreateSubUser extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateSubUserRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateSubUserRequest {
		return $this->get("request", "\\ascio\\v3\\CreateSubUserRequest");
	}
	public function createRequest () : \ascio\v3\CreateSubUserRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateSubUserRequest");
	}
}