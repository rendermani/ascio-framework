<?php

// XSLT-WSDL-Client. Generated PHP class of CreateNameServerRequest

namespace ascio\service\v3;
use ascio\db\v3\CreateNameServerRequestDb;
use ascio\api\v3\CreateNameServerRequestApi;
use ascio\base\v3\Base;


class CreateNameServerRequest extends Base  {

	protected $_apiProperties=["NameServer"];
	protected $_apiObjects=["NameServer"];
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