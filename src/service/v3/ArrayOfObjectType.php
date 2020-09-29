<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfObjectType

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfObjectTypeDb;
use ascio\api\v3\ArrayOfObjectTypeApi;
use ascio\base\v3\DbArrayBase;


class ArrayOfObjectType extends DbArrayBase  {

	protected $_apiProperties=["ObjectType"];
	protected $_apiObjects=[];
	protected $ObjectType;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfObjectTypeDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfObjectTypeDb|null $db
	* @return ArrayOfObjectTypeDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setObjectType (?Iterable $ObjectType = null) : self {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?Iterable {
		return $this->get("ObjectType", "string");
	}
	public function addObjectType ($item = null) : string {
		return $this->addItem("ObjectType","string",func_get_args());
	}
}