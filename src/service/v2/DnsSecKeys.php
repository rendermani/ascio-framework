<?php

// XSLT-WSDL-Client. Generated PHP class of DnsSecKeys

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\DnsSecKeysDb;
use ascio\api\v2\DnsSecKeysApi;


abstract class DnsSecKeys extends DbBase  {

	protected $_apiProperties=["DnsSecKey1", "DnsSecKey2", "DnsSecKey3", "DnsSecKey4", "DnsSecKey5"];
	protected $_apiObjects=["DnsSecKey1", "DnsSecKey2", "DnsSecKey3", "DnsSecKey4", "DnsSecKey5"];
	protected $DnsSecKey1;
	protected $DnsSecKey2;
	protected $DnsSecKey3;
	protected $DnsSecKey4;
	protected $DnsSecKey5;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DnsSecKeysDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DnsSecKeysApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DnsSecKeysApi
	*/
	public function api($api = null) {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param DnsSecKeysDb|null $db
	* @return DnsSecKeysDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setDnsSecKey1 (?\ascio\v2\DnsSecKey $DnsSecKey1 = null) : self {
		$this->set("DnsSecKey1", $DnsSecKey1);
		return $this;
	}
	public function getDnsSecKey1 () : ?\ascio\v2\DnsSecKey {
		return $this->get("DnsSecKey1", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey1 () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey1", "\\ascio\\v2\\DnsSecKey");
	}
	public function setDnsSecKey2 (?\ascio\v2\DnsSecKey $DnsSecKey2 = null) : self {
		$this->set("DnsSecKey2", $DnsSecKey2);
		return $this;
	}
	public function getDnsSecKey2 () : ?\ascio\v2\DnsSecKey {
		return $this->get("DnsSecKey2", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey2 () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey2", "\\ascio\\v2\\DnsSecKey");
	}
	public function setDnsSecKey3 (?\ascio\v2\DnsSecKey $DnsSecKey3 = null) : self {
		$this->set("DnsSecKey3", $DnsSecKey3);
		return $this;
	}
	public function getDnsSecKey3 () : ?\ascio\v2\DnsSecKey {
		return $this->get("DnsSecKey3", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey3 () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey3", "\\ascio\\v2\\DnsSecKey");
	}
	public function setDnsSecKey4 (?\ascio\v2\DnsSecKey $DnsSecKey4 = null) : self {
		$this->set("DnsSecKey4", $DnsSecKey4);
		return $this;
	}
	public function getDnsSecKey4 () : ?\ascio\v2\DnsSecKey {
		return $this->get("DnsSecKey4", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey4 () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey4", "\\ascio\\v2\\DnsSecKey");
	}
	public function setDnsSecKey5 (?\ascio\v2\DnsSecKey $DnsSecKey5 = null) : self {
		$this->set("DnsSecKey5", $DnsSecKey5);
		return $this;
	}
	public function getDnsSecKey5 () : ?\ascio\v2\DnsSecKey {
		return $this->get("DnsSecKey5", "\\ascio\\v2\\DnsSecKey");
	}
	public function createDnsSecKey5 () : \ascio\v2\DnsSecKey {
		return $this->create ("DnsSecKey5", "\\ascio\\v2\\DnsSecKey");
	}
}