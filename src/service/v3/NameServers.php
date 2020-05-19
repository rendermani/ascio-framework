<?php

// XSLT-WSDL-Client. Generated PHP class of NameServers

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\NameServersDb;
use ascio\api\v3\NameServersApi;


class NameServers extends Base  {

	protected $_apiProperties=["NameServer1", "NameServer2", "NameServer3", "NameServer4", "NameServer5", "NameServer6", "NameServer7", "NameServer8", "NameServer9", "NameServer10", "NameServer11", "NameServer12", "NameServer13"];
	protected $_apiObjects=["NameServer1", "NameServer2", "NameServer3", "NameServer4", "NameServer5", "NameServer6", "NameServer7", "NameServer8", "NameServer9", "NameServer10", "NameServer11", "NameServer12", "NameServer13"];
	protected $NameServer1;
	protected $NameServer2;
	protected $NameServer3;
	protected $NameServer4;
	protected $NameServer5;
	protected $NameServer6;
	protected $NameServer7;
	protected $NameServer8;
	protected $NameServer9;
	protected $NameServer10;
	protected $NameServer11;
	protected $NameServer12;
	protected $NameServer13;

	public function setNameServer1 (?\ascio\v3\NameServer $NameServer1 = null) : self {
		$this->set("NameServer1", $NameServer1);
		return $this;
	}
	public function getNameServer1 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer1", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer1 () : \ascio\v3\NameServer {
		return $this->create ("NameServer1", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer2 (?\ascio\v3\NameServer $NameServer2 = null) : self {
		$this->set("NameServer2", $NameServer2);
		return $this;
	}
	public function getNameServer2 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer2", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer2 () : \ascio\v3\NameServer {
		return $this->create ("NameServer2", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer3 (?\ascio\v3\NameServer $NameServer3 = null) : self {
		$this->set("NameServer3", $NameServer3);
		return $this;
	}
	public function getNameServer3 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer3", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer3 () : \ascio\v3\NameServer {
		return $this->create ("NameServer3", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer4 (?\ascio\v3\NameServer $NameServer4 = null) : self {
		$this->set("NameServer4", $NameServer4);
		return $this;
	}
	public function getNameServer4 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer4", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer4 () : \ascio\v3\NameServer {
		return $this->create ("NameServer4", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer5 (?\ascio\v3\NameServer $NameServer5 = null) : self {
		$this->set("NameServer5", $NameServer5);
		return $this;
	}
	public function getNameServer5 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer5", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer5 () : \ascio\v3\NameServer {
		return $this->create ("NameServer5", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer6 (?\ascio\v3\NameServer $NameServer6 = null) : self {
		$this->set("NameServer6", $NameServer6);
		return $this;
	}
	public function getNameServer6 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer6", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer6 () : \ascio\v3\NameServer {
		return $this->create ("NameServer6", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer7 (?\ascio\v3\NameServer $NameServer7 = null) : self {
		$this->set("NameServer7", $NameServer7);
		return $this;
	}
	public function getNameServer7 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer7", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer7 () : \ascio\v3\NameServer {
		return $this->create ("NameServer7", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer8 (?\ascio\v3\NameServer $NameServer8 = null) : self {
		$this->set("NameServer8", $NameServer8);
		return $this;
	}
	public function getNameServer8 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer8", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer8 () : \ascio\v3\NameServer {
		return $this->create ("NameServer8", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer9 (?\ascio\v3\NameServer $NameServer9 = null) : self {
		$this->set("NameServer9", $NameServer9);
		return $this;
	}
	public function getNameServer9 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer9", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer9 () : \ascio\v3\NameServer {
		return $this->create ("NameServer9", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer10 (?\ascio\v3\NameServer $NameServer10 = null) : self {
		$this->set("NameServer10", $NameServer10);
		return $this;
	}
	public function getNameServer10 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer10", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer10 () : \ascio\v3\NameServer {
		return $this->create ("NameServer10", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer11 (?\ascio\v3\NameServer $NameServer11 = null) : self {
		$this->set("NameServer11", $NameServer11);
		return $this;
	}
	public function getNameServer11 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer11", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer11 () : \ascio\v3\NameServer {
		return $this->create ("NameServer11", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer12 (?\ascio\v3\NameServer $NameServer12 = null) : self {
		$this->set("NameServer12", $NameServer12);
		return $this;
	}
	public function getNameServer12 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer12", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer12 () : \ascio\v3\NameServer {
		return $this->create ("NameServer12", "\\ascio\\v3\\NameServer");
	}
	public function setNameServer13 (?\ascio\v3\NameServer $NameServer13 = null) : self {
		$this->set("NameServer13", $NameServer13);
		return $this;
	}
	public function getNameServer13 () : ?\ascio\v3\NameServer {
		return $this->get("NameServer13", "\\ascio\\v3\\NameServer");
	}
	public function createNameServer13 () : \ascio\v3\NameServer {
		return $this->create ("NameServer13", "\\ascio\\v3\\NameServer");
	}
}