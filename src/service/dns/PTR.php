<?php

// XSLT-WSDL-Client. Generated PHP class of PTR

namespace ascio\service\dns;
use ascio\db\dns\PTRDb;
use ascio\api\dns\PTRApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class PTR extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PTRDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new PTRApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return PTRApi
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
	* @param PTRDb|null $db
	* @return PTRDb
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