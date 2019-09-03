<?php

// XSLT-WSDL-Client. Generated PHP class of CreateApprovalDocumentationResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateApprovalDocumentationResponseDb;
use ascio\api\v2\CreateApprovalDocumentationResponseApi;


abstract class CreateApprovalDocumentationResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateApprovalDocumentationResult", "documentationId"];
	protected $_apiObjects=["CreateApprovalDocumentationResult"];
	protected $CreateApprovalDocumentationResult;
	protected $documentationId;

	public function setCreateApprovalDocumentationResult (?\ascio\v2\Response $CreateApprovalDocumentationResult = null) : self {
		$this->set("CreateApprovalDocumentationResult", $CreateApprovalDocumentationResult);
		return $this;
	}
	public function getCreateApprovalDocumentationResult () : ?\ascio\v2\Response {
		return $this->get("CreateApprovalDocumentationResult", "\\ascio\\v2\\Response");
	}
	public function createCreateApprovalDocumentationResult () : \ascio\v2\Response {
		return $this->create ("CreateApprovalDocumentationResult", "\\ascio\\v2\\Response");
	}
	public function setDocumentationId (?string $documentationId = null) : self {
		$this->set("documentationId", $documentationId);
		return $this;
	}
	public function getDocumentationId () : ?string {
		return $this->get("documentationId", "string");
	}
}