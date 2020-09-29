<?php

// XSLT-WSDL-Client. Generated PHP class of CreateNameServerResponse

namespace ascio\service\v3;
use ascio\db\v3\CreateNameServerResponseDb;
use ascio\api\v3\CreateNameServerResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class CreateNameServerResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "NameServer"];
	protected $_apiObjects=["Errors", "NameServer"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $NameServer;

	public function setNameServer (?\ascio\v3\NameServer $NameServer = null) : self {
		$this->set("NameServer", $NameServer);
		return $this;
	}
	public function getNameServer () : ?\ascio\v3\NameServer {
		return $this->get("NameServer", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer () : \ascio\v3\NameServer {
		return $this->create ("NameServer", "\\ascio\\v3\\NameServer");
	}
}