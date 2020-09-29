<?php

// XSLT-WSDL-Client. Generated PHP class of SOA

namespace ascio\service\dns;
use ascio\db\dns\SOADb;
use ascio\api\dns\SOAApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class SOA extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "Expire", "HostmasterEmail", "PrimaryNameServer", "Refresh", "Retry", "SerialUsage"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $Expire;
	protected $HostmasterEmail;
	protected $PrimaryNameServer;
	protected $Refresh;
	protected $Retry;
	protected $SerialUsage;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SOADb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new SOAApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return SOAApi
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
	* @param SOADb|null $db
	* @return SOADb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setExpire (?int $Expire = null) : self {
		$this->set("Expire", $Expire);
		return $this;
	}
	public function getExpire () : ?int {
		return $this->get("Expire", "int");
	}
	public function setHostmasterEmail (?string $HostmasterEmail = null) : self {
		$this->set("HostmasterEmail", $HostmasterEmail);
		return $this;
	}
	public function getHostmasterEmail () : ?string {
		return $this->get("HostmasterEmail", "string");
	}
	public function setPrimaryNameServer (?string $PrimaryNameServer = null) : self {
		$this->set("PrimaryNameServer", $PrimaryNameServer);
		return $this;
	}
	public function getPrimaryNameServer () : ?string {
		return $this->get("PrimaryNameServer", "string");
	}
	public function setRefresh (?int $Refresh = null) : self {
		$this->set("Refresh", $Refresh);
		return $this;
	}
	public function getRefresh () : ?int {
		return $this->get("Refresh", "int");
	}
	public function setRetry (?int $Retry = null) : self {
		$this->set("Retry", $Retry);
		return $this;
	}
	public function getRetry () : ?int {
		return $this->get("Retry", "int");
	}
	public function setSerialUsage (?int $SerialUsage = null) : self {
		$this->set("SerialUsage", $SerialUsage);
		return $this;
	}
	public function getSerialUsage () : ?int {
		return $this->get("SerialUsage", "int");
	}
}