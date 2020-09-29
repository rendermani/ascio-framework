<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfNameServer

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfNameServerDb;
use ascio\api\v2\ArrayOfNameServerApi;
use ascio\base\v2\ArrayBase;


class ArrayOfNameServer extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["NameServer"];
	protected $_apiObjects=["NameServer"];
	protected $NameServer;

	public function setNameServer (?Iterable $NameServer = null) : self {
		$this->set("NameServer", $NameServer);
		return $this;
	}
	public function getNameServer () : ?Iterable {
		return $this->get("NameServer", "\\ascio\\v2\\NameServer");
	}
	public function createNameServer () : \ascio\v2\NameServer {
		return $this->create ("NameServer", "\\ascio\\v2\\NameServer");
	}
	public function addNameServer ($item = null) : \ascio\v2\NameServer {
		return $this->addItem("NameServer","\\ascio\\v2\\NameServer",func_get_args());
	}
}