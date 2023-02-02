<?php

// XSLT-WSDL-Client. Generated PHP class of GetCustomerReferenceResponse

namespace ascio\service\v3;
use ascio\db\v3\GetCustomerReferenceResponseDb;
use ascio\api\v3\GetCustomerReferenceResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetCustomerReferenceResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "CustomerReferenceInfo"];
	protected $_apiObjects=["Errors", "CustomerReferenceInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $CustomerReferenceInfo;

	public function setCustomerReferenceInfo (?\ascio\v3\CustomerReferenceInfo $CustomerReferenceInfo = null) : self {
		$this->set("CustomerReferenceInfo", $CustomerReferenceInfo);
		return $this;
	}
	public function getCustomerReferenceInfo () : ?\ascio\v3\CustomerReferenceInfo {
		return $this->get("CustomerReferenceInfo", "\\ascio\\v3\\CustomerReferenceInfo");
	}
	public function createCustomerReferenceInfo () : \ascio\v3\CustomerReferenceInfo {
		return $this->create ("CustomerReferenceInfo", "\\ascio\\v3\\CustomerReferenceInfo");
	}
}