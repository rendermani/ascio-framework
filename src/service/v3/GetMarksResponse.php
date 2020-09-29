<?php

// XSLT-WSDL-Client. Generated PHP class of GetMarksResponse

namespace ascio\service\v3;
use ascio\db\v3\GetMarksResponseDb;
use ascio\api\v3\GetMarksResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetMarksResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "MarkInfos"];
	protected $_apiObjects=["Errors", "MarkInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $MarkInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setMarkInfos (?\ascio\v3\ArrayOfMarkInfo $MarkInfos = null) : self {
		$this->set("MarkInfos", $MarkInfos);
		return $this;
	}
	public function getMarkInfos () : ?\ascio\v3\ArrayOfMarkInfo {
		return $this->get("MarkInfos", "\\ascio\\v3\\ArrayOfMarkInfo");
	}
	public function createMarkInfos () : \ascio\v3\ArrayOfMarkInfo {
		return $this->create ("MarkInfos", "\\ascio\\v3\\ArrayOfMarkInfo");
	}
}