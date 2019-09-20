<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfZone

namespace ascio\service\dns;
use ascio\base\dns\DbArrayBase;
use ascio\db\dns\ArrayOfZoneDb;
use ascio\api\dns\ArrayOfZoneApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfZone extends DbArrayBase  {

	protected $_apiProperties=["Zone"];
	protected $_apiObjects=["Zone"];
	protected $Zone;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfZoneDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfZoneDb|null $db
	* @return ArrayOfZoneDb
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
	public function current() : \ascio\dns\Zone {
		return parent::current();
	}
	public function first() : \ascio\dns\Zone {
		return parent::first();
	}
	public function last() : \ascio\dns\Zone {
		return parent::last();
	}
	public function index($nr) : \ascio\dns\Zone {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setZone (?Iterable $Zone = null) : self {
		$this->set("Zone", $Zone);
		return $this;
	}
	public function getZone () : ?Iterable {
		return $this->get("Zone", "\\ascio\\dns\\Zone");
	}
	public function createZone () : \ascio\dns\Zone {
		return $this->create ("Zone", "\\ascio\\dns\\Zone");
	}
	public function addZone () : \ascio\dns\Zone {
		return $this->addItem(func_get_args(),"\\ascio\\dns\\Zone");
	}
	public function addZones ($array) : self {
		return $this->add(func_get_args());
	}
}