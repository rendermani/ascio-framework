<?php

// XSLT-WSDL-Client. Generated PHP class of AckMessage

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\AckMessageDb;
use ascio\api\v2\AckMessageApi;


class AckMessage extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "msgId"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $msgId;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setMsgId (?int $msgId = null) : self {
		$this->set("msgId", $msgId);
		return $this;
	}
	public function getMsgId () : ?int {
		return $this->get("msgId", "int");
	}
}