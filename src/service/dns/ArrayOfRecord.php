<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfRecord

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfRecordDb;
use ascio\api\dns\ArrayOfRecordApi;
use ascio\base\dns\DbArrayBase;


class ArrayOfRecord extends DbArrayBase  {

	protected $_apiProperties=["Record"];
	protected $_apiObjects=["Record"];
	protected $Record;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfRecordDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ArrayOfRecordApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ArrayOfRecordApi
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
	* @param ArrayOfRecordDb|null $db
	* @return ArrayOfRecordDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRecord (?Iterable $Record = null) : self {
		$this->set("Record", $Record);
		return $this;
	}
	public function getRecord () : ?Iterable {
		return $this->get("Record", "\\ascio\\dns\\Record");
	}
	public function createRecord () : \ascio\dns\Record {
		return $this->create ("Record", "\\ascio\\dns\\Record");
	}
	public function addRecord ($item = null) : \ascio\dns\Record {
		return $this->addItem("Record","\\ascio\\dns\\Record",func_get_args());
	}
}