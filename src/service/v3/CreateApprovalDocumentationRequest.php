<?php

// XSLT-WSDL-Client. Generated PHP class of CreateApprovalDocumentationRequest

namespace ascio\service\v3;
use ascio\db\v3\CreateApprovalDocumentationRequestDb;
use ascio\api\v3\CreateApprovalDocumentationRequestApi;
use ascio\base\v3\Base;


class CreateApprovalDocumentationRequest extends Base  {

	protected $_apiProperties=["OrderId", "ObjectNames", "Approval", "Attachments"];
	protected $_apiObjects=["ObjectNames", "Approval", "Attachments"];
	protected $OrderId;
	protected $ObjectNames;
	protected $Approval;
	protected $Attachments;

	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setObjectNames (?\ascio\v3\ArrayOfstring $ObjectNames = null) : self {
		$this->set("ObjectNames", $ObjectNames);
		return $this;
	}
	public function getObjectNames () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createObjectNames () : \ascio\v3\ArrayOfstring {
		return $this->create ("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setApproval (?\ascio\v3\AbstractApproval $Approval = null) : self {
		$this->set("Approval", $Approval);
		return $this;
	}
	public function getApproval () : ?\ascio\v3\AbstractApproval {
		return $this->get("Approval", "\\ascio\\v3\\AbstractApproval");
	}
	public function createApproval () : \ascio\v3\AbstractApproval {
		return $this->create ("Approval", "\\ascio\\v3\\AbstractApproval");
	}
	public function setAttachments (?\ascio\v3\ArrayOfAttachment $Attachments = null) : self {
		$this->set("Attachments", $Attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v3\ArrayOfAttachment {
		return $this->get("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v3\ArrayOfAttachment {
		return $this->create ("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
}