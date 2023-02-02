<?php

// XSLT-WSDL-Client. Generated PHP class of IrtpApproval

namespace ascio\service\v3;
use ascio\db\v3\IrtpApprovalDb;
use ascio\api\v3\IrtpApprovalApi;
use ascio\v3\AbstractApproval;
use ascio\api\v3\AbstractApprovalApi;


class IrtpApproval extends AbstractApproval  {

	protected $_apiProperties=["LoosingOwnerApprovalTimestamp", "LoosingOwnerApprovalIP", "IRTPOptOut", "GainingOwnerApprovalTimestamp", "GainingOwnerApprovalIP"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $LoosingOwnerApprovalTimestamp;
	protected $LoosingOwnerApprovalIP;
	protected $IRTPOptOut;
	protected $GainingOwnerApprovalTimestamp;
	protected $GainingOwnerApprovalIP;

	public function setIRTPOptOut (?bool $IRTPOptOut = null) : self {
		$this->set("IRTPOptOut", $IRTPOptOut);
		return $this;
	}
	public function getIRTPOptOut () : ?bool {
		return $this->get("IRTPOptOut", "bool");
	}
	public function setGainingOwnerApprovalTimestamp (?string $GainingOwnerApprovalTimestamp = null) : self {
		$this->set("GainingOwnerApprovalTimestamp", $GainingOwnerApprovalTimestamp);
		return $this;
	}
	public function getGainingOwnerApprovalTimestamp () : ?string {
		return $this->get("GainingOwnerApprovalTimestamp", "string");
	}
	public function setGainingOwnerApprovalIP (?string $GainingOwnerApprovalIP = null) : self {
		$this->set("GainingOwnerApprovalIP", $GainingOwnerApprovalIP);
		return $this;
	}
	public function getGainingOwnerApprovalIP () : ?string {
		return $this->get("GainingOwnerApprovalIP", "string");
	}
}