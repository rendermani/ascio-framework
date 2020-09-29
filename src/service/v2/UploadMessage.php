<?php

// XSLT-WSDL-Client. Generated PHP class of UploadMessage

namespace ascio\service\v2;
use ascio\db\v2\UploadMessageDb;
use ascio\api\v2\UploadMessageApi;
use ascio\base\v2\RequestRootElement;


class UploadMessage extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "orderId", "message"];
	protected $_apiObjects=["message"];
	protected $sessionId;
	protected $orderId;
	protected $message;

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
	public function setMessage (?\ascio\v2\Message $message = null) : self {
		$this->set("message", $message);
		return $this;
	}
	public function getMessage () : ?\ascio\v2\Message {
		return $this->get("message", "\\ascio\\v2\\Message");
	}
	public function createMessage () : \ascio\v2\Message {
		return $this->create ("message", "\\ascio\\v2\\Message");
	}
}