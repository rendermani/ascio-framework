<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfRoleItem

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfRoleItemDb;
use ascio\api\dns\ArrayOfRoleItemApi;
use ascio\base\dns\DbArrayBase;


class ArrayOfRoleItem extends DbArrayBase  {

	protected $_apiProperties=["RoleItem"];
	protected $_apiObjects=["RoleItem"];
	protected $RoleItem;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfRoleItemDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ArrayOfRoleItemApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ArrayOfRoleItemApi
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
	* @param ArrayOfRoleItemDb|null $db
	* @return ArrayOfRoleItemDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRoleItem (?Iterable $RoleItem = null) : self {
		$this->set("RoleItem", $RoleItem);
		return $this;
	}
	public function getRoleItem () : ?Iterable {
		return $this->get("RoleItem", "\\ascio\\dns\\RoleItem");
	}
	public function createRoleItem () : \ascio\dns\RoleItem {
		return $this->create ("RoleItem", "\\ascio\\dns\\RoleItem");
	}
	public function addRoleItem ($item = null) : \ascio\dns\RoleItem {
		return $this->addItem("RoleItem","\\ascio\\dns\\RoleItem",func_get_args());
	}
}