<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSupportOrder

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\CreateSupportOrderDb;
use ascio\api\v2\CreateSupportOrderApi;


abstract class CreateSupportOrder extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "subject", "body", "attachments"];
	protected $_apiObjects=["attachments"];
	protected $sessionId;
	protected $subject;
	protected $body;
	protected $attachments;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setSubject (?string $subject = null) : self {
		$this->set("subject", $subject);
		return $this;
	}
	public function getSubject () : ?string {
		return $this->get("subject", "string");
	}
	public function setBody (?string $body = null) : self {
		$this->set("body", $body);
		return $this;
	}
	public function getBody () : ?string {
		return $this->get("body", "string");
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