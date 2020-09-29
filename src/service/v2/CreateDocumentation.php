<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDocumentation

namespace ascio\service\v2;
use ascio\db\v2\CreateDocumentationDb;
use ascio\api\v2\CreateDocumentationApi;
use ascio\base\v2\RequestRootElement;


class CreateDocumentation extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "attachments"];
	protected $_apiObjects=["attachments"];
	protected $sessionId;
	protected $attachments;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setAttachments (?\ascio\v2\ArrayOfAttachment $attachments = null) : self {
		$this->set("attachments", $attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v2\ArrayOfAttachment {
		return $this->get("attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v2\ArrayOfAttachment {
		return $this->create ("attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
}