<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteCustomerReferenceRequest

namespace ascio\service\v3;
use ascio\db\v3\DeleteCustomerReferenceRequestDb;
use ascio\api\v3\DeleteCustomerReferenceRequestApi;
use ascio\base\v3\Base;


class DeleteCustomerReferenceRequest extends Base  {

	protected $_apiProperties=["Handle", "UnAssignDeletedCustomerReference"];
	protected $_apiObjects=[];
	protected $Handle;
	protected $UnAssignDeletedCustomerReference;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setUnAssignDeletedCustomerReference (?bool $UnAssignDeletedCustomerReference = null) : self {
		$this->set("UnAssignDeletedCustomerReference", $UnAssignDeletedCustomerReference);
		return $this;
	}
	public function getUnAssignDeletedCustomerReference () : ?bool {
		return $this->get("UnAssignDeletedCustomerReference", "bool");
	}
}