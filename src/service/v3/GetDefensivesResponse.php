<?php

// XSLT-WSDL-Client. Generated PHP class of GetDefensivesResponse

namespace ascio\service\v3;
use ascio\db\v3\GetDefensivesResponseDb;
use ascio\api\v3\GetDefensivesResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetDefensivesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "DefensiveInfos"];
	protected $_apiObjects=["Errors", "DefensiveInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $DefensiveInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setDefensiveInfos (?\ascio\v3\ArrayOfDefensiveInfo $DefensiveInfos = null) : self {
		$this->set("DefensiveInfos", $DefensiveInfos);
		return $this;
	}
	public function getDefensiveInfos () : ?\ascio\v3\ArrayOfDefensiveInfo {
		return $this->get("DefensiveInfos", "\\ascio\\v3\\ArrayOfDefensiveInfo");
	}
	public function createDefensiveInfos () : \ascio\v3\ArrayOfDefensiveInfo {
		return $this->create ("DefensiveInfos", "\\ascio\\v3\\ArrayOfDefensiveInfo");
	}
}