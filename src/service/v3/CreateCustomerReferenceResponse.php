<?php

// XSLT-WSDL-Client. Generated PHP class of CreateCustomerReferenceResponse

namespace ascio\service\v3;
use ascio\db\v3\CreateCustomerReferenceResponseDb;
use ascio\api\v3\CreateCustomerReferenceResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class CreateCustomerReferenceResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "CustomerReference"];
	protected $_apiObjects=["Errors", "CustomerReference"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $CustomerReference;

	public function setCustomerReference (?\ascio\v3\CustomerReference $CustomerReference = null) : self {
		$this->set("CustomerReference", $CustomerReference);
		return $this;
	}
	public function getCustomerReference () : ?\ascio\v3\CustomerReference {
		return $this->get("CustomerReference", "\\ascio\\v3\\CustomerReference");
	}
	public function createCustomerReference () : \ascio\v3\CustomerReference {
		return $this->create ("CustomerReference", "\\ascio\\v3\\CustomerReference");
	}
}