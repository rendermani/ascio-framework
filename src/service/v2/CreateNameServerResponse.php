<?php

// XSLT-WSDL-Client. Generated PHP class of CreateNameServerResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateNameServerResponseDb;
use ascio\api\v2\CreateNameServerResponseApi;


class CreateNameServerResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateNameServerResult", "nameServer"];
	protected $_apiObjects=["CreateNameServerResult", "nameServer"];
	protected $CreateNameServerResult;
	protected $nameServer;

	public function setCreateNameServerResult (?\ascio\v2\Response $CreateNameServerResult = null) : \ascio\v2\CreateNameServerResponse {
		$this->set("CreateNameServerResult", $CreateNameServerResult);
		return $this;
	}
	public function getCreateNameServerResult () : ?\ascio\v2\Response {
		return $this->get("CreateNameServerResult", "\\ascio\\v2\\Response");
	}
	public function createCreateNameServerResult () : \ascio\v2\Response {
		return $this->create ("CreateNameServerResult", "\\ascio\\v2\\Response");
	}
	public function setNameServer (?\ascio\v2\NameServer $nameServer = null) : \ascio\v2\CreateNameServerResponse {
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