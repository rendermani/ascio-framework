<?php

// XSLT-WSDL-Client. Generated PHP class of CreateNameServer

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\CreateNameServerDb;
use ascio\api\v2\CreateNameServerApi;


class CreateNameServer extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "nameServer"];
	protected $_apiObjects=["nameServer"];
	protected $sessionId;
	protected $nameServer;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setNameServer (?\ascio\v2\NameServer $nameServer = null) : self {
		$this->set("nameServer", $nameServer);
		return $this;
	}
	public function getNameServer () : ?\ascio\v2\NameServer {
		return $this->get("nameServer", "\\ascio\\v2\\NameServer");
	}
	public function createNameServer () : \ascio\v2\NameServer {
		return $this->create ("nameServer", "\\ascio\\v2\\NameServer");
	}
}