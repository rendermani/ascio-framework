<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfZone

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfZoneDb;
use ascio\api\dns\ArrayOfZoneApi;
use ascio\base\dns\DbArrayBase;


class ArrayOfZone extends DbArrayBase  {

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
	public function addZone ($item = null) : \ascio\dns\Zone {
		return $this->addItem("Zone","\\ascio\\dns\\Zone",func_get_args());
	}
}