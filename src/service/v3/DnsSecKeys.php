<?php

// XSLT-WSDL-Client. Generated PHP class of DnsSecKeys

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\DnsSecKeysDb;
use ascio\api\v3\DnsSecKeysApi;


class DnsSecKeys extends Base  {

	protected $_apiProperties=["DnsSecKey1", "DnsSecKey2", "DnsSecKey3", "DnsSecKey4", "DnsSecKey5"];
	protected $_apiObjects=["DnsSecKey1", "DnsSecKey2", "DnsSecKey3", "DnsSecKey4", "DnsSecKey5"];
	protected $DnsSecKey1;
	protected $DnsSecKey2;
	protected $DnsSecKey3;
	protected $DnsSecKey4;
	protected $DnsSecKey5;

	public function setDnsSecKey1 (?\ascio\v3\DnsSecKey $DnsSecKey1 = null) : self {
		$this->set("DnsSecKey1", $DnsSecKey1);
		return $this;
	}
	public function getDnsSecKey1 () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey1", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey1 () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey1", "\\ascio\\v3\\DnsSecKey");
	}
	public function setDnsSecKey2 (?\ascio\v3\DnsSecKey $DnsSecKey2 = null) : self {
		$this->set("DnsSecKey2", $DnsSecKey2);
		return $this;
	}
	public function getDnsSecKey2 () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey2", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey2 () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey2", "\\ascio\\v3\\DnsSecKey");
	}
	public function setDnsSecKey3 (?\ascio\v3\DnsSecKey $DnsSecKey3 = null) : self {
		$this->set("DnsSecKey3", $DnsSecKey3);
		return $this;
	}
	public function getDnsSecKey3 () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey3", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey3 () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey3", "\\ascio\\v3\\DnsSecKey");
	}
	public function setDnsSecKey4 (?\ascio\v3\DnsSecKey $DnsSecKey4 = null) : self {
		$this->set("DnsSecKey4", $DnsSecKey4);
		return $this;
	}
	public function getDnsSecKey4 () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey4", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey4 () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey4", "\\ascio\\v3\\DnsSecKey");
	}
	public function setDnsSecKey5 (?\ascio\v3\DnsSecKey $DnsSecKey5 = null) : self {
		$this->set("DnsSecKey5", $DnsSecKey5);
		return $this;
	}
	public function getDnsSecKey5 () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey5", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey5 () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey5", "\\ascio\\v3\\DnsSecKey");
	}
}