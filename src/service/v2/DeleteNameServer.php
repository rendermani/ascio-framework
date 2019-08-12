<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteNameServer

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\DeleteNameServerDb;
use ascio\api\v2\DeleteNameServerApi;


class DeleteNameServer extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "nameServerHandle"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $nameServerHandle;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\DeleteNameServer {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setNameServerHandle (?string $nameServerHandle = null) : \ascio\v2\DeleteNameServer {
		$this->set("nameServerHandle", $nameServerHandle);
		return $this;
	}
	public function getNameServerHandle () : ?string {
		return $this->get("nameServerHandle", "string");
	}
}