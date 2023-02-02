<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameWatchListResponse

namespace ascio\service\v3;
use ascio\db\v3\GetNameWatchListResponseDb;
use ascio\api\v3\GetNameWatchListResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetNameWatchListResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "NameWatchInfos"];
	protected $_apiObjects=["Errors", "NameWatchInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $NameWatchInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setNameWatchInfos (?\ascio\v3\ArrayOfNameWatchInfo $NameWatchInfos = null) : self {
		$this->set("NameWatchInfos", $NameWatchInfos);
		return $this;
	}
	public function getNameWatchInfos () : ?\ascio\v3\ArrayOfNameWatchInfo {
		return $this->get("NameWatchInfos", "\\ascio\\v3\\ArrayOfNameWatchInfo");
	}
	public function createNameWatchInfos () : \ascio\v3\ArrayOfNameWatchInfo {
		return $this->create ("NameWatchInfos", "\\ascio\\v3\\ArrayOfNameWatchInfo");
	}
}