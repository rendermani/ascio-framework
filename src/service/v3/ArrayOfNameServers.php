<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfNameServers

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfNameServersDb;
use ascio\api\v3\ArrayOfNameServersApi;
use ascio\base\v3\ArrayBase;


class ArrayOfNameServers extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["NameServer"];
	protected $_apiObjects=["NameServer"];
	protected $NameServer;

	public function setNameServer (?Iterable $NameServer = null) : self {
		$this->set("NameServer", $NameServer);
		return $this;
	}
	public function getNameServer () : ?Iterable {
		return $this->get("NameServer", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer () : \ascio\v3\NameServer {
		return $this->create ("NameServer", "\\ascio\\v3\\NameServer");
	}
	public function addNameServer ($item = null) : \ascio\v3\NameServer {
		return $this->addItem("NameServer","\\ascio\\v3\\NameServer",func_get_args());
	}
}