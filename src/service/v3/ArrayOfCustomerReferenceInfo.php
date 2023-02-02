<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfCustomerReferenceInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfCustomerReferenceInfoDb;
use ascio\api\v3\ArrayOfCustomerReferenceInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfCustomerReferenceInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["CustomerReferenceInfo"];
	protected $_apiObjects=["CustomerReferenceInfo"];
	protected $CustomerReferenceInfo;

	public function setCustomerReferenceInfo (?Iterable $CustomerReferenceInfo = null) : self {
		$this->set("CustomerReferenceInfo", $CustomerReferenceInfo);
		return $this;
	}
	public function getCustomerReferenceInfo () : ?Iterable {
		return $this->get("CustomerReferenceInfo", "\\ascio\\v3\\CustomerReferenceInfo");
	}
	public function createCustomerReferenceInfo () : \ascio\v3\CustomerReferenceInfo {
		return $this->create ("CustomerReferenceInfo", "\\ascio\\v3\\CustomerReferenceInfo");
	}
	public function addCustomerReferenceInfo ($item = null) : \ascio\v3\CustomerReferenceInfo {
		return $this->addItem("CustomerReferenceInfo","\\ascio\\v3\\CustomerReferenceInfo",func_get_args());
	}
}