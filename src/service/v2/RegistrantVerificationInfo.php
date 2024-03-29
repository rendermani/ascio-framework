<?php

// XSLT-WSDL-Client. Generated PHP class of RegistrantVerificationInfo

namespace ascio\service\v2;
use ascio\db\v2\RegistrantVerificationInfoDb;
use ascio\api\v2\RegistrantVerificationInfoApi;
use ascio\base\v2\Base;


class RegistrantVerificationInfo extends Base  {

	protected $_apiProperties=["EmailAddress", "VerificationStatus", "VerificationDetails"];
	protected $_apiObjects=["VerificationDetails"];
	protected $EmailAddress;
	protected $VerificationStatus;
	protected $VerificationDetails;

	public function setEmailAddress (?string $EmailAddress = null) : self {
		$this->set("EmailAddress", $EmailAddress);
		return $this;
	}
	public function getEmailAddress () : ?string {
		return $this->get("EmailAddress", "string");
	}
	public function setVerificationStatus (?string $VerificationStatus = null) : self {
		$this->set("VerificationStatus", $VerificationStatus);
		return $this;
	}
	public function getVerificationStatus () : ?string {
		return $this->get("VerificationStatus", "string");
	}
	public function setVerificationDetails (?\ascio\v2\RegistrantVerificationDetails $VerificationDetails = null) : self {
		$this->set("VerificationDetails", $VerificationDetails);
		return $this;
	}
	public function getVerificationDetails () : ?\ascio\v2\RegistrantVerificationDetails {
		return $this->get("VerificationDetails", "\\ascio\\v2\\RegistrantVerificationDetails");
	}
	public function createVerificationDetails () : \ascio\v2\RegistrantVerificationDetails {
		return $this->create ("VerificationDetails", "\\ascio\\v2\\RegistrantVerificationDetails");
	}
}