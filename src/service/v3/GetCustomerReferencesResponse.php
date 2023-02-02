<?php

// XSLT-WSDL-Client. Generated PHP class of GetCustomerReferencesResponse

namespace ascio\service\v3;
use ascio\db\v3\GetCustomerReferencesResponseDb;
use ascio\api\v3\GetCustomerReferencesResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetCustomerReferencesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "CustomerReferenceInfos"];
	protected $_apiObjects=["Errors", "CustomerReferenceInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $CustomerReferenceInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setCustomerReferenceInfos (?\ascio\v3\ArrayOfCustomerReferenceInfo $CustomerReferenceInfos = null) : self {
		$this->set("CustomerReferenceInfos", $CustomerReferenceInfos);
		return $this;
	}
	public function getCustomerReferenceInfos () : ?\ascio\v3\ArrayOfCustomerReferenceInfo {
		return $this->get("CustomerReferenceInfos", "\\ascio\\v3\\ArrayOfCustomerReferenceInfo");
	}
	public function createCustomerReferenceInfos () : \ascio\v3\ArrayOfCustomerReferenceInfo {
		return $this->create ("CustomerReferenceInfos", "\\ascio\\v3\\ArrayOfCustomerReferenceInfo");
	}
}