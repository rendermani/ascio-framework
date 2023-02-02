<?php

// XSLT-WSDL-Client. Generated PHP class of StartRegistrantVerificationResponse

namespace ascio\service\v3;
use ascio\db\v3\StartRegistrantVerificationResponseDb;
use ascio\api\v3\StartRegistrantVerificationResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class StartRegistrantVerificationResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "VerificationProcessStarted", "RegistrantVerificationInfo"];
	protected $_apiObjects=["Errors", "RegistrantVerificationInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $VerificationProcessStarted;
	protected $RegistrantVerificationInfo;

	public function setVerificationProcessStarted (?bool $VerificationProcessStarted = null) : self {
		$this->set("VerificationProcessStarted", $VerificationProcessStarted);
		return $this;
	}
	public function getVerificationProcessStarted () : ?bool {
		return $this->get("VerificationProcessStarted", "bool");
	}
	public function setRegistrantVerificationInfo (?\ascio\v3\RegistrantVerificationInfo $RegistrantVerificationInfo = null) : self {
		$this->set("RegistrantVerificationInfo", $RegistrantVerificationInfo);
		return $this;
	}
	public function getRegistrantVerificationInfo () : ?\ascio\v3\RegistrantVerificationInfo {
		return $this->get("RegistrantVerificationInfo", "\\ascio\\v3\\RegistrantVerificationInfo");
	}
	public function createRegistrantVerificationInfo () : \ascio\v3\RegistrantVerificationInfo {
		return $this->create ("RegistrantVerificationInfo", "\\ascio\\v3\\RegistrantVerificationInfo");
	}
}