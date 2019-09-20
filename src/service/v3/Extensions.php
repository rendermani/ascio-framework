<?php

// XSLT-WSDL-Client. Generated PHP class of Extensions

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ExtensionsDb;
use ascio\api\v3\ExtensionsApi;
use ascio\base\ArrayInterface;


abstract class Extensions extends DbArrayBase  {

	protected $_apiProperties=["KeyValue"];
	protected $_apiObjects=["KeyValue"];
	protected $KeyValue;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ExtensionsDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ExtensionsApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
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
	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v3\KeyValue {
		return parent::current();
	}
	public function first() : \ascio\v3\KeyValue {
		return parent::first();
	}
	public function last() : \ascio\v3\KeyValue {
		return parent::last();
	}
	public function index($nr) : \ascio\v3\KeyValue {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setKeyValue (?Iterable $KeyValue = null) : self {
		$this->set("KeyValue", $KeyValue);
		return $this;
	}
	public function getKeyValue () : ?Iterable {
		return $this->get("KeyValue", "\\ascio\\v3\\KeyValue");
	}
	public function createKeyValue () : \ascio\v3\KeyValue {
		return $this->create ("KeyValue", "\\ascio\\v3\\KeyValue");
	}
	public function addKeyValue (string $Key, string $Value) : \ascio\v3\KeyValue {
		return $this->addItem(func_get_args(),"\\ascio\\v3\\KeyValue");
	}
	public function addKeyValues ($array) : self {
		return $this->add(func_get_args());
	}
}