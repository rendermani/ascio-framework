<?php

// XSLT-WSDL-Client. Generated PHP class of UploadDocumentation

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\UploadDocumentationDb;
use ascio\api\v2\UploadDocumentationApi;


abstract class UploadDocumentation extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "orderId", "fileName", "content"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $orderId;
	protected $fileName;
	protected $content;

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
	public function setOrderId (?string $orderId = null) : self {
		$this->set("orderId", $orderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("orderId", "string");
	}
	public function setFileName (?string $fileName = null) : self {
		$this->set("fileName", $fileName);
		return $this;
	}
	public function getFileName () : ?string {
		return $this->get("fileName", "string");
	}
	public function setContent (?\base64Binary $content = null) : self {
		$this->set("content", $content);
		return $this;
	}
	public function getContent () : ?\base64Binary {
		return $this->get("content", "\\base64Binary");
	}
}