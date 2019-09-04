<?php

// XSLT-WSDL-Client. Generated PHP class of PollMessage

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\PollMessageDb;
use ascio\api\v2\PollMessageApi;


abstract class PollMessage extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "msgType"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $msgType;

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
	public function setMsgType (?string $msgType = null) : self {
		$this->set("msgType", $msgType);
		return $this;
	}
	public function getMsgType () : ?string {
		return $this->get("msgType", "string");
	}
}