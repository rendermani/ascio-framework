<?php

// XSLT-WSDL-Client. Generated PHP class of PollMessage

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\PollMessageDb;
use ascio\api\v2\PollMessageApi;


class PollMessage extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "msgType"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $msgType;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\PollMessage {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setMsgType (?string $msgType = null) : \ascio\v2\PollMessage {
		$this->set("msgType", $msgType);
		return $this;
	}
	public function getMsgType () : ?string {
		return $this->get("msgType", "string");
	}
}