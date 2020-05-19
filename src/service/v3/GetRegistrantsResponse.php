<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantsResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetRegistrantsResponseDb;
use ascio\api\v3\GetRegistrantsResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetRegistrantsResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "RegistrantInfos"];
	protected $_apiObjects=["Errors", "RegistrantInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $RegistrantInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setRegistrantInfos (?\ascio\v3\ArrayOfRegistrantInfo $RegistrantInfos = null) : self {
		$this->set("RegistrantInfos", $RegistrantInfos);
		return $this;
	}
	public function getRegistrantInfos () : ?\ascio\v3\ArrayOfRegistrantInfo {
		return $this->get("RegistrantInfos", "\\ascio\\v3\\ArrayOfRegistrantInfo");
	}
	public function createRegistrantInfos () : \ascio\v3\ArrayOfRegistrantInfo {
		return $this->create ("RegistrantInfos", "\\ascio\\v3\\ArrayOfRegistrantInfo");
	}
}