<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantVerificationResponse

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantVerificationResponseDb;
use ascio\api\v3\GetRegistrantVerificationResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetRegistrantVerificationResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "RegistrantVerificationInfo"];
	protected $_apiObjects=["Errors", "RegistrantVerificationInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $RegistrantVerificationInfo;

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