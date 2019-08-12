<?php

// XSLT-WSDL-Client. Generated PHP class of Extensions

namespace ascio\service\v2;
use ascio\base\v2\DbArrayBase;
use ascio\db\v2\ExtensionsDb;
use ascio\api\v2\ExtensionsApi;


class Extensions extends DbArrayBase  {

	protected $_apiProperties=["Extension"];
	protected $_apiObjects=["Extension"];
	protected $Extension;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ExtensionsDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ExtensionsApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ExtensionsApi
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
	* @param ExtensionsDb|null $db
	* @return ExtensionsDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setExtension (?Iterable $Extension = null) : \ascio\v2\Extensions {
		$this->set("Extension", $Extension);
		return $this;
	}
	public function getExtension () : ?Iterable {
		return $this->get("Extension", "\\ascio\\v2\\Extension");
	}
	public function createExtension () : \ascio\v2\Extension {
		return $this->create ("Extension", "\\ascio\\v2\\Extension");
	}
	public function addExtension (string $Key, string $Value) : ?\ascio\v2\Extension {
		return $this->add("Extension","\\ascio\\v2\\Extension",func_get_args());
	}
}