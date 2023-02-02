<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationInfo

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantVerificationInfoDb;
use ascio\api\v3\GetRegistrantVerificationInfoApi;
use ascio\base\v3\RequestRootElement;


class GetRegistrantVerificationInfo extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\GetRegistrantVerificationRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetRegistrantVerificationRequest {
		return $this->get("request", "\\ascio\\v3\\GetRegistrantVerificationRequest");
	}
	public function createRequest () : \ascio\v3\GetRegistrantVerificationRequest {
		return $this->create ("request", "\\ascio\\v3\\GetRegistrantVerificationRequest");
	}
}