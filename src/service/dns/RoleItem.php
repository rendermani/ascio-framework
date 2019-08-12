<?php

// XSLT-WSDL-Client. Generated PHP class of RoleItem

namespace ascio\service\dns;
use ascio\base\dns\DbBase;
use ascio\db\dns\RoleItemDb;
use ascio\api\dns\RoleItemApi;


class RoleItem extends DbBase  {

	protected $_apiProperties=["Rights", "Role"];
	protected $_apiObjects=["Rights"];
	protected $Rights;
	protected $Role;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new RoleItemDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new RoleItemApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return RoleItemApi
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
	* @param RoleItemDb|null $db
	* @return RoleItemDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRights (?\ascio\dns\ArrayOfstring $Rights = null) : \ascio\dns\RoleItem {
		$this->set("Rights", $Rights);
		return $this;
	}
	public function getRights () : ?\ascio\dns\ArrayOfstring {
		return $this->get("Rights", "\\ascio\\dns\\ArrayOfstring");
	}
	public function createRights () : \ascio\dns\ArrayOfstring {
		return $this->create ("Rights", "\\ascio\\dns\\ArrayOfstring");
	}
	public function setRole (?string $Role = null) : \ascio\dns\RoleItem {
		$this->set("Role", $Role);
		return $this;
	}
	public function getRole () : ?string {
		return $this->get("Role", "string");
	}
}