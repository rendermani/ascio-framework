<?php

// XSLT-WSDL-Client. Generated PHP class of SRV

namespace ascio\service\dns;
use ascio\dns\Record;
use ascio\db\dns\SRVDb;
use ascio\api\dns\SRVApi;
use ascio\api\dns\RecordApi;


class SRV extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "Port", "Priority", "Weight"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $Port;
	protected $Priority;
	protected $Weight;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SRVDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new SRVApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return SRVApi
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
	* @param SRVDb|null $db
	* @return SRVDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setPort (?int $Port = null) : \ascio\dns\SRV {
		$this->set("Port", $Port);
		return $this;
	}
	public function getPort () : ?int {
		return $this->get("Port", "int");
	}
	public function setPriority (?int $Priority = null) : \ascio\dns\SRV {
		$this->set("Priority", $Priority);
		return $this;
	}
	public function getPriority () : ?int {
		return $this->get("Priority", "int");
	}
	public function setWeight (?int $Weight = null) : \ascio\dns\SRV {
		$this->set("Weight", $Weight);
		return $this;
	}
	public function getWeight () : ?int {
		return $this->get("Weight", "int");
	}
}