<?php

// XSLT-WSDL-Client. Generated PHP class of WebForward

namespace ascio\service\dns;
use ascio\dns\Record;
use ascio\db\dns\WebForwardDb;
use ascio\api\dns\WebForwardApi;
use ascio\api\dns\RecordApi;


class WebForward extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "RedirectionType"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $RedirectionType;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new WebForwardDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new WebForwardApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return WebForwardApi
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
	* @param WebForwardDb|null $db
	* @return WebForwardDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRedirectionType (?string $RedirectionType = null) : \ascio\dns\WebForward {
		$this->set("RedirectionType", $RedirectionType);
		return $this;
	}
	public function getRedirectionType () : ?string {
		return $this->get("RedirectionType", "string");
	}
}