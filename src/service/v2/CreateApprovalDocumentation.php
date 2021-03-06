<?php

// XSLT-WSDL-Client. Generated PHP class of CreateApprovalDocumentation

namespace ascio\service\v2;
use ascio\db\v2\CreateApprovalDocumentationDb;
use ascio\api\v2\CreateApprovalDocumentationApi;
use ascio\base\v2\RequestRootElement;


class CreateApprovalDocumentation extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "approvalDocumentation"];
	protected $_apiObjects=["approvalDocumentation"];
	protected $sessionId;
	protected $approvalDocumentation;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setApprovalDocumentation (?\ascio\v2\ApprovalDocumentation $approvalDocumentation = null) : self {
		$this->set("approvalDocumentation", $approvalDocumentation);
		return $this;
	}
	public function getApprovalDocumentation () : ?\ascio\v2\ApprovalDocumentation {
		return $this->get("approvalDocumentation", "\\ascio\\v2\\ApprovalDocumentation");
	}
	public function createApprovalDocumentation () : \ascio\v2\ApprovalDocumentation {
		return $this->create ("approvalDocumentation", "\\ascio\\v2\\ApprovalDocumentation");
	}
}