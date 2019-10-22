<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfZoneLogEntry

namespace ascio\service\dns;
use ascio\base\dns\DbArrayBase;
use ascio\db\dns\ArrayOfZoneLogEntryDb;
use ascio\api\dns\ArrayOfZoneLogEntryApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfZoneLogEntry extends DbArrayBase  {

	protected $_apiProperties=["ZoneLogEntry"];
	protected $_apiObjects=["ZoneLogEntry"];
	protected $ZoneLogEntry;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfZoneLogEntryDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ArrayOfZoneLogEntryApi($this);
		$api->parent($this);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ArrayOfZoneLogEntryApi
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
	* @param ArrayOfZoneLogEntryDb|null $db
	* @return ArrayOfZoneLogEntryDb
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
	public function current() : \ascio\dns\ZoneLogEntry {
		return parent::current();
	}
	public function first() : \ascio\dns\ZoneLogEntry {
		return parent::first();
	}
	public function last() : \ascio\dns\ZoneLogEntry {
		return parent::last();
	}
	public function index($nr) : \ascio\dns\ZoneLogEntry {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setZoneLogEntry (?Iterable $ZoneLogEntry = null) : self {
		$this->set("ZoneLogEntry", $ZoneLogEntry);
		return $this;
	}
	public function getZoneLogEntry () : ?Iterable {
		return $this->get("ZoneLogEntry", "\\ascio\\dns\\ZoneLogEntry");
	}
	public function createZoneLogEntry () : \ascio\dns\ZoneLogEntry {
		return $this->create ("ZoneLogEntry", "\\ascio\\dns\\ZoneLogEntry");
	}
	public function addZoneLogEntry () : \ascio\dns\ZoneLogEntry {
		return $this->addItem(func_get_args(),"\\ascio\\dns\\ZoneLogEntry");
	}
	public function addZoneLogEntrys ($array) : self {
		return $this->add(func_get_args());
	}
}