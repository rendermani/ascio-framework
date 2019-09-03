<?php

// XSLT-WSDL-Client. Generated PHP class of Extension

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\ExtensionDb;
use ascio\api\v2\ExtensionApi;


abstract class Extension extends DbBase  {

	protected $_apiProperties=["Key", "Value"];
	protected $_apiObjects=[];
	protected $Key;
	protected $Value;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ExtensionDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ExtensionApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ExtensionApi
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
	* @param ExtensionDb|null $db
	* @return ExtensionDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setKey (?string $Key = null) : self {
		$this->set("Key", $Key);
		return $this;
	}
	public function getKey () : ?string {
		return $this->get("Key", "string");
	}
	public function setValue (?string $Value = null) : self {
		$this->set("Value", $Value);
		return $this;
	}
	public function getValue () : ?string {
		return $this->get("Value", "string");
	}
}