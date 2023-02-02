<?php

// XSLT-WSDL-Client. Generated PHP class of AbstractApproval

namespace ascio\service\v3;
use ascio\db\v3\AbstractApprovalDb;
use ascio\api\v3\AbstractApprovalApi;
use ascio\base\v3\Base;


class AbstractApproval extends Base  {

	protected $_apiProperties=["LoosingOwnerApprovalTimestamp", "LoosingOwnerApprovalIP"];
	protected $_apiObjects=[];
	protected $_substitutions = [
		["name" => "IrtpApproval","type" => "\\ascio\\v3\\IrtpApproval"], 
		["name" => "FoaApproval","type" => "\\ascio\\v3\\FoaApproval"] 
	];

	protected $LoosingOwnerApprovalTimestamp;
	protected $LoosingOwnerApprovalIP;

	public function setLoosingOwnerApprovalTimestamp (?string $LoosingOwnerApprovalTimestamp = null) : self {
		$this->set("LoosingOwnerApprovalTimestamp", $LoosingOwnerApprovalTimestamp);
		return $this;
	}
	public function getLoosingOwnerApprovalTimestamp () : ?string {
		return $this->get("LoosingOwnerApprovalTimestamp", "string");
	}
	public function setLoosingOwnerApprovalIP (?string $LoosingOwnerApprovalIP = null) : self {
		$this->set("LoosingOwnerApprovalIP", $LoosingOwnerApprovalIP);
		return $this;
	}
	public function getLoosingOwnerApprovalIP () : ?string {
		return $this->get("LoosingOwnerApprovalIP", "string");
	}
}