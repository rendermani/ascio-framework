<?php

// XSLT-WSDL-Client. Generated PHP class of CreateApprovalDocumentation

namespace ascio\service\v3;
use ascio\db\v3\CreateApprovalDocumentationDb;
use ascio\api\v3\CreateApprovalDocumentationApi;
use ascio\base\v3\RequestRootElement;


class CreateApprovalDocumentation extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CreateApprovalDocumentationRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CreateApprovalDocumentationRequest {
		return $this->get("request", "\\ascio\\v3\\CreateApprovalDocumentationRequest");
	}
	public function createRequest () : \ascio\v3\CreateApprovalDocumentationRequest {
		return $this->create ("request", "\\ascio\\v3\\CreateApprovalDocumentationRequest");
	}
}