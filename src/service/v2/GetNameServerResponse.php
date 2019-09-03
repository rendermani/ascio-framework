<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameServerResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetNameServerResponseDb;
use ascio\api\v2\GetNameServerResponseApi;


abstract class GetNameServerResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetNameServerResult", "nameServer"];
	protected $_apiObjects=["GetNameServerResult", "nameServer"];
	protected $GetNameServerResult;
	protected $nameServer;

	public function setGetNameServerResult (?\ascio\v2\Response $GetNameServerResult = null) : self {
		$this->set("GetNameServerResult", $GetNameServerResult);
		return $this;
	}
	public function getGetNameServerResult () : ?\ascio\v2\Response {
		return $this->get("GetNameServerResult", "\\ascio\\v2\\Response");
	}
	public function createGetNameServerResult () : \ascio\v2\Response {
		return $this->create ("GetNameServerResult", "\\ascio\\v2\\Response");
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