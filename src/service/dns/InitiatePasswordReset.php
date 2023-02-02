<?php

// XSLT-WSDL-Client. Generated PHP class of InitiatePasswordReset

namespace ascio\service\dns;
use ascio\db\dns\InitiatePasswordResetDb;
use ascio\api\dns\InitiatePasswordResetApi;
use ascio\base\dns\RequestRootElement;


class InitiatePasswordReset extends RequestRootElement  {

	protected $_apiProperties=["partnerUserName", "userName", "reason"];
	protected $_apiObjects=[];
	protected $partnerUserName;
	protected $userName;
	protected $reason;

	public function setPartnerUserName (?string $partnerUserName = null) : self {
		$this->set("partnerUserName", $partnerUserName);
		return $this;
	}
	public function getPartnerUserName () : ?string {
		return $this->get("partnerUserName", "string");
	}
	public function setUserName (?string $userName = null) : self {
		$this->set("userName", $userName);
		return $this;
	}
	public function getUserName () : ?string {
		return $this->get("userName", "string");
	}
	public function setReason (?string $reason = null) : self {
		$this->set("reason", $reason);
		return $this;
	}
	public function getReason () : ?string {
		return $this->get("reason", "string");
	}
}