<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationInfoResponse

namespace ascio\service\v2;
use ascio\db\v2\GetRegistrantVerificationInfoResponseDb;
use ascio\api\v2\GetRegistrantVerificationInfoResponseApi;
use ascio\base\v2\ResponseRootElement;


class GetRegistrantVerificationInfoResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRegistrantVerificationInfoResult", "verificationInfo"];
	protected $_apiObjects=["GetRegistrantVerificationInfoResult", "verificationInfo"];
	protected $GetRegistrantVerificationInfoResult;
	protected $verificationInfo;

	public function setGetRegistrantVerificationInfoResult (?\ascio\v2\Response $GetRegistrantVerificationInfoResult = null) : self {
		$this->set("GetRegistrantVerificationInfoResult", $GetRegistrantVerificationInfoResult);
		return $this;
	}
	public function getGetRegistrantVerificationInfoResult () : ?\ascio\v2\Response {
		return $this->get("GetRegistrantVerificationInfoResult", "\\ascio\\v2\\Response");
	}
	public function createGetRegistrantVerificationInfoResult () : \ascio\v2\Response {
		return $this->create ("GetRegistrantVerificationInfoResult", "\\ascio\\v2\\Response");
	}
	public function setVerificationInfo (?\ascio\v2\RegistrantVerificationInfo $verificationInfo = null) : self {
		$this->set("verificationInfo", $verificationInfo);
		return $this;
	}
	public function getVerificationInfo () : ?\ascio\v2\RegistrantVerificationInfo {
		return $this->get("verificationInfo", "\\ascio\\v2\\RegistrantVerificationInfo");
	}
	public function createVerificationInfo () : \ascio\v2\RegistrantVerificationInfo {
		return $this->create ("verificationInfo", "\\ascio\\v2\\RegistrantVerificationInfo");
	}
}