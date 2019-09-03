<?php

// XSLT-WSDL-Client. Generated PHP class of LogOut

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\LogOutDb;
use ascio\api\v2\LogOutApi;


abstract class LogOut extends RequestRootElement  {

	protected $_apiProperties=["sessionId"];
	protected $_apiObjects=[];
	protected $sessionId;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
}