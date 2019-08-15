<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationStatusResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetRegistrantVerificationStatusResponseDb;
use ascio\api\v2\GetRegistrantVerificationStatusResponseApi;


class GetRegistrantVerificationStatusResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRegistrantVerificationStatusResult", "verificationStatus"];
	protected $_apiObjects=["GetRegistrantVerificationStatusResult"];
	protected $GetRegistrantVerificationStatusResult;
	protected $verificationStatus;

	public function setGetRegistrantVerificationStatusResult (?\ascio\v2\Response $GetRegistrantVerificationStatusResult = null) : self {
		$this->set("GetRegistrantVerificationStatusResult", $GetRegistrantVerificationStatusResult);
		return $this;
	}
	public function getGetRegistrantVerificationStatusResult () : ?\ascio\v2\Response {
		return $this->get("GetRegistrantVerificationStatusResult", "\\ascio\\v2\\Response");
	}
	public function createGetRegistrantVerificationStatusResult () : \ascio\v2\Response {
		return $this->create ("GetRegistrantVerificationStatusResult", "\\ascio\\v2\\Response");
	}
	public function setVerificationStatus (?string $verificationStatus = null) : self {
		$this->set("verificationStatus", $verificationStatus);
		return $this;
	}
	public function getVerificationStatus () : ?string {
		return $this->get("verificationStatus", "string");
	}
}