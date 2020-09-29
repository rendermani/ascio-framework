<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateSubUser

namespace ascio\service\v3;
use ascio\db\v3\UpdateSubUserDb;
use ascio\api\v3\UpdateSubUserApi;
use ascio\base\v3\RequestRootElement;


class UpdateSubUser extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\UpdateSubUserRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\UpdateSubUserRequest {
		return $this->get("request", "\\ascio\\v3\\UpdateSubUserRequest");
	}
	public function createRequest () : \ascio\v3\UpdateSubUserRequest {
		return $this->create ("request", "\\ascio\\v3\\UpdateSubUserRequest");
	}
}