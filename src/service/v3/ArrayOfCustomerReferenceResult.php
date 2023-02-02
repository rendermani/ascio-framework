<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfCustomerReferenceResult

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfCustomerReferenceResultDb;
use ascio\api\v3\ArrayOfCustomerReferenceResultApi;
use ascio\base\v3\ArrayBase;


class ArrayOfCustomerReferenceResult extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["CustomerReferenceResult"];
	protected $_apiObjects=["CustomerReferenceResult"];
	protected $CustomerReferenceResult;

	public function setCustomerReferenceResult (?Iterable $CustomerReferenceResult = null) : self {
		$this->set("CustomerReferenceResult", $CustomerReferenceResult);
		return $this;
	}
	public function getCustomerReferenceResult () : ?Iterable {
		return $this->get("CustomerReferenceResult", "\\ascio\\v3\\CustomerReferenceResult");
	}
	public function createCustomerReferenceResult () : \ascio\v3\CustomerReferenceResult {
		return $this->create ("CustomerReferenceResult", "\\ascio\\v3\\CustomerReferenceResult");
	}
	public function addCustomerReferenceResult ($item = null) : \ascio\v3\CustomerReferenceResult {
		return $this->addItem("CustomerReferenceResult","\\ascio\\v3\\CustomerReferenceResult",func_get_args());
	}
}