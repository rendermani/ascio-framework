<?php

// XSLT-WSDL-Client. Generated PHP class of MailForward

namespace ascio\service\dns;
use ascio\dns\Record;
use ascio\db\dns\MailForwardDb;
use ascio\api\dns\MailForwardApi;
use ascio\api\dns\RecordApi;


abstract class MailForward extends Record  {

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
		$db = new MailForwardDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new MailForwardApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return MailForwardApi
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
	* @param MailForwardDb|null $db
	* @return MailForwardDb
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