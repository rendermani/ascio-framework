<?php

// XSLT-WSDL-Client. Generated PHP class of StartRegistrantVerification

namespace ascio\service\v3;
use ascio\db\v3\StartRegistrantVerificationDb;
use ascio\api\v3\StartRegistrantVerificationApi;
use ascio\base\v3\RequestRootElement;


class StartRegistrantVerification extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\StartRegistrantVerificationRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\StartRegistrantVerificationRequest {
		return $this->get("request", "\\ascio\\v3\\StartRegistrantVerificationRequest");
	}
	public function createRequest () : \ascio\v3\StartRegistrantVerificationRequest {
		return $this->create ("request", "\\ascio\\v3\\StartRegistrantVerificationRequest");
	}
}