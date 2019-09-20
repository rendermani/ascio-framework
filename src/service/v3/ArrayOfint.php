<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfint

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ArrayOfintDb;
use ascio\api\v3\ArrayOfintApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfint extends DbArrayBase  {

	protected $_apiProperties=["int"];
	protected $_apiObjects=[];
	protected $int;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfintDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfintDb|null $db
	* @return ArrayOfintDb
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
	* Getters and setters for API-Properties
	*/
	public function setInt (?Iterable $int = null) : self {
		$this->set("int", $int);
		return $this;
	}
	public function getInt () : ?Iterable {
		return $this->get("int", "int");
	}
	public function addInt () : int {
		return $this->addItem(func_get_args(),"int");
	}
	public function addInts ($array) : self {
		return $this->add(func_get_args());
	}
}