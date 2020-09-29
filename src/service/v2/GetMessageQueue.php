<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessageQueue

namespace ascio\service\v2;
use ascio\db\v2\GetMessageQueueDb;
use ascio\api\v2\GetMessageQueueApi;
use ascio\base\v2\RequestRootElement;


class GetMessageQueue extends RequestRootElement  {

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