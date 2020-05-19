<?php

// XSLT-WSDL-Client. Generated PHP class of GetSslApprovers

namespace ascio\service\v3;
use ascio\base\v3\RequestRootElement;
use ascio\db\v3\GetSslApproversDb;
use ascio\api\v3\GetSslApproversApi;


class GetSslApprovers extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetSslApproversRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetSslApproversRequest {
		return $this->get("request", "\\ascio\\v3\\GetSslApproversRequest");
	}
	public function createRequest () : \ascio\v3\GetSslApproversRequest {
		return $this->create ("request", "\\ascio\\v3\\GetSslApproversRequest");
	}
}