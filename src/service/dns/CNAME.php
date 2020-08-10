<?php

// XSLT-WSDL-Client. Generated PHP class of CNAME

namespace ascio\service\dns;
use ascio\dns\Record;
use ascio\db\dns\CNAMEDb;
use ascio\api\dns\CNAMEApi;
use ascio\api\dns\RecordApi;


class CNAME extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new CNAMEDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new CNAMEApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return CNAMEApi
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
	* @param CNAMEDb|null $db
	* @return CNAMEDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
}