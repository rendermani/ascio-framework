<?php

// XSLT-WSDL-Client. Generated PHP class of CreateApprovalDocumentationResponse

namespace ascio\service\v3;
use ascio\db\v3\CreateApprovalDocumentationResponseDb;
use ascio\api\v3\CreateApprovalDocumentationResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class CreateApprovalDocumentationResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "DocumentationId"];
	protected $_apiObjects=["Errors"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $DocumentationId;

	public function setDocumentationId (?string $DocumentationId = null) : self {
		$this->set("DocumentationId", $DocumentationId);
		return $this;
	}
	public function getDocumentationId () : ?string {
		return $this->get("DocumentationId", "string");
	}
}