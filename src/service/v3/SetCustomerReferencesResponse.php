<?php

// XSLT-WSDL-Client. Generated PHP class of SetCustomerReferencesResponse

namespace ascio\service\v3;
use ascio\db\v3\SetCustomerReferencesResponseDb;
use ascio\api\v3\SetCustomerReferencesResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class SetCustomerReferencesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Results"];
	protected $_apiObjects=["Errors", "Results"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Results;

	public function setResults (?\ascio\v3\ArrayOfCustomerReferenceResult $Results = null) : self {
		$this->set("Results", $Results);
		return $this;
	}
	public function getResults () : ?\ascio\v3\ArrayOfCustomerReferenceResult {
		return $this->get("Results", "\\ascio\\v3\\ArrayOfCustomerReferenceResult");
	}
	public function createResults () : \ascio\v3\ArrayOfCustomerReferenceResult {
		return $this->create ("Results", "\\ascio\\v3\\ArrayOfCustomerReferenceResult");
	}
}