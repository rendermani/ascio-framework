<?php

// XSLT-WSDL-Client. Generated PHP class of GetSubUsers

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetSubUsersDb;
use ascio\api\v3\GetSubUsersApi;


class GetSubUsers extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSubUsersRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSubUsersRequest {
		return $this->get("request", "\\ascio\\v3\\GetSubUsersRequest");
	}
	public function createRequest () : \ascio\v3\GetSubUsersRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSubUsersRequest");
	}
}