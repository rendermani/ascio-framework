<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteSubUser

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\DeleteSubUserDb;
use ascio\api\v3\DeleteSubUserApi;


class DeleteSubUser extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\DeleteSubUserRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\DeleteSubUserRequest {
		return $this->get("request", "\\ascio\\v3\\DeleteSubUserRequest");
	}
	public function createRequest () : \ascio\v3\DeleteSubUserRequest {
		return $this->create ("request", "\\ascio\\v3\\DeleteSubUserRequest");
	}
}