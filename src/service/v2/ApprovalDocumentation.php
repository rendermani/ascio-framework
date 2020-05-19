<?php

// XSLT-WSDL-Client. Generated PHP class of ApprovalDocumentation

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\ApprovalDocumentationDb;
use ascio\api\v2\ApprovalDocumentationApi;


class ApprovalDocumentation extends Base  {

	protected $_apiProperties=["Type", "ObjectNames", "OrderId", "Attachments", "Extensions"];
	protected $_apiObjects=["ObjectNames", "Attachments", "Extensions"];
	protected $Type;
	protected $ObjectNames;
	protected $OrderId;
	protected $Attachments;
	protected $Extensions;

	public function setType (?string $Type = null) : self {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setObjectNames (?\ascio\v2\ArrayOfstring $ObjectNames = null) : self {
		$this->set("ObjectNames", $ObjectNames);
		return $this;
	}
	public function getObjectNames () : ?\ascio\v2\ArrayOfstring {
		return $this->get("ObjectNames", "\\ascio\\v2\\ArrayOfstring");
	}
	public function createObjectNames () : \ascio\v2\ArrayOfstring {
		return $this->create ("ObjectNames", "\\ascio\\v2\\ArrayOfstring");
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setAttachments (?\ascio\v2\ArrayOfAttachment $Attachments = null) : self {
		$this->set("Attachments", $Attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v2\ArrayOfAttachment {
		return $this->get("Attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v2\ArrayOfAttachment {
		return $this->create ("Attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
	public function setExtensions (?\ascio\v2\Extensions $Extensions = null) : self {
		$this->set("Extensions", $Extensions);
		return $this;
	}
	public function getExtensions () : ?\ascio\v2\Extensions {
		return $this->get("Extensions", "\\ascio\\v2\\Extensions");
	}
	public function createExtensions () : \ascio\v2\Extensions {
		return $this->create ("Extensions", "\\ascio\\v2\\Extensions");
	}
}