<?php

// XSLT-WSDL-Client. Generated PHP class of RegistrantVerificationDetails

namespace ascio\service\v3;
use ascio\db\v3\RegistrantVerificationDetailsDb;
use ascio\api\v3\RegistrantVerificationDetailsApi;
use ascio\base\v3\Base;


class RegistrantVerificationDetails extends Base  {

	protected $_apiProperties=["VerifiedBy", "VerificationDate", "Messages"];
	protected $_apiObjects=["Messages"];
	protected $VerifiedBy;
	protected $VerificationDate;
	protected $Messages;

	public function setVerifiedBy (?string $VerifiedBy = null) : self {
		$this->set("VerifiedBy", $VerifiedBy);
		return $this;
	}
	public function getVerifiedBy () : ?string {
		return $this->get("VerifiedBy", "string");
	}
	public function setVerificationDate (?\DateTime $VerificationDate = null) : self {
		$this->set("VerificationDate", $VerificationDate);
		return $this;
	}
	public function getVerificationDate () : ?\DateTime {
		return $this->get("VerificationDate", "\\DateTime");
	}
	public function setMessages (?\ascio\v3\ArrayOfMessage $Messages = null) : self {
		$this->set("Messages", $Messages);
		return $this;
	}
	public function getMessages () : ?\ascio\v3\ArrayOfMessage {
		return $this->get("Messages", "\\ascio\\v3\\ArrayOfMessage");
	}
	public function createMessages () : \ascio\v3\ArrayOfMessage {
		return $this->create ("Messages", "\\ascio\\v3\\ArrayOfMessage");
	}
}