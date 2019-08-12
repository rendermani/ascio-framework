<?php

// XSLT-WSDL-Client. Generated PHP class of GetMessageQueue

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetMessageQueueDb;
use ascio\api\v2\GetMessageQueueApi;


class GetMessageQueue extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "msgId"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $msgId;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\GetMessageQueue {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setMsgId (?int $msgId = null) : \ascio\v2\GetMessageQueue {
		$this->set("msgId", $msgId);
		return $this;
	}
	public function getMsgId () : ?int {
		return $this->get("msgId", "int");
	}
}