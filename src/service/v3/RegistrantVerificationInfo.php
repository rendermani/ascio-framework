<?php

// XSLT-WSDL-Client. Generated PHP class of RegistrantVerificationInfo

namespace ascio\service\v3;
use ascio\db\v3\RegistrantVerificationInfoDb;
use ascio\api\v3\RegistrantVerificationInfoApi;
use ascio\base\v3\Base;


class RegistrantVerificationInfo extends Base  {

	protected $_apiProperties=["Email", "VerificationStatus", "VerificationDetails"];
	protected $_apiObjects=["VerificationDetails"];
	protected $Email;
	protected $VerificationStatus;
	protected $VerificationDetails;

	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
	}
	public function setVerificationStatus (?string $VerificationStatus = null) : self {
		$this->set("VerificationStatus", $VerificationStatus);
		return $this;
	}
	public function getVerificationStatus () : ?string {
		return $this->get("VerificationStatus", "string");
	}
	public function setVerificationDetails (?\ascio\v3\RegistrantVerificationDetails $VerificationDetails = null) : self {
		$this->set("VerificationDetails", $VerificationDetails);
		return $this;
	}
	public function getVerificationDetails () : ?\ascio\v3\RegistrantVerificationDetails {
		return $this->get("VerificationDetails", "\\ascio\\v3\\RegistrantVerificationDetails");
	}
	public function createVerificationDetails () : \ascio\v3\RegistrantVerificationDetails {
		return $this->create ("VerificationDetails", "\\ascio\\v3\\RegistrantVerificationDetails");
	}
}