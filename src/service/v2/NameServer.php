<?php

// XSLT-WSDL-Client. Generated PHP class of NameServer

namespace ascio\service\v2;
use ascio\db\v2\NameServerDb;
use ascio\api\v2\NameServerApi;
use ascio\base\v2\DbBase;


class NameServer extends DbBase  {

	protected $_apiProperties=["CreDate", "Handle", "HostName", "IpAddress", "Status", "IpV6Address", "Details"];
	protected $_apiObjects=[];
	protected $CreDate;
	protected $Handle;
	protected $HostName;
	protected $IpAddress;
	protected $Status;
	protected $IpV6Address;
	protected $Details;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new NameServerDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new NameServerApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return NameServerApi
	*/
	public function api($api = null) : ?\ascio\base\ApiModelBase {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param NameServerDb|null $db
	* @return NameServerDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCreDate (?\DateTime $CreDate = null) : self {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?\DateTime {
		return $this->get("CreDate", "\\DateTime");
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setHostName (?string $HostName = null) : self {
		$this->set("HostName", $HostName);
		return $this;
	}
	public function getHostName () : ?string {
		return $this->get("HostName", "string");
	}
	public function setIpAddress (?string $IpAddress = null) : self {
		$this->set("IpAddress", $IpAddress);
		return $this;
	}
	public function getIpAddress () : ?string {
		return $this->get("IpAddress", "string");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setIpV6Address (?string $IpV6Address = null) : self {
		$this->set("IpV6Address", $IpV6Address);
		return $this;
	}
	public function getIpV6Address () : ?string {
		return $this->get("IpV6Address", "string");
	}
	public function setDetails (?string $Details = null) : self {
		$this->set("Details", $Details);
		return $this;
	}
	public function getDetails () : ?string {
		return $this->get("Details", "string");
	}
}