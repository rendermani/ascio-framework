<?php

// XSLT-WSDL-Client. Generated PHP class of MX

namespace ascio\service\dns;
use ascio\dns\Record;
use ascio\db\dns\MXDb;
use ascio\api\dns\MXApi;
use ascio\api\dns\RecordApi;


abstract class MX extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "Priority"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $Priority;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new MXDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new MXApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return MXApi
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
	* @param MXDb|null $db
	* @return MXDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setPriority (?int $Priority = null) : self {
		$this->set("Priority", $Priority);
		return $this;
	}
	public function getPriority () : ?int {
		return $this->get("Priority", "int");
	}
}