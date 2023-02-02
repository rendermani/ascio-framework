<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateCustomerReferenceRequest

namespace ascio\service\v3;
use ascio\db\v3\UpdateCustomerReferenceRequestDb;
use ascio\api\v3\UpdateCustomerReferenceRequestApi;
use ascio\base\v3\Base;


class UpdateCustomerReferenceRequest extends Base  {

	protected $_apiProperties=["CustomerReference"];
	protected $_apiObjects=["CustomerReference"];
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