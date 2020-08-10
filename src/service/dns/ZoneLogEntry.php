<?php

// XSLT-WSDL-Client. Generated PHP class of ZoneLogEntry

namespace ascio\service\dns;
use ascio\base\dns\DbBase;
use ascio\db\dns\ZoneLogEntryDb;
use ascio\api\dns\ZoneLogEntryApi;


class ZoneLogEntry extends DbBase  {

	protected $_apiProperties=["Action", "ActionBy", "ActionByIpAddress", "ActionDate", "Record", "ZoneName"];
	protected $_apiObjects=["Record"];
	protected $Action;
	protected $ActionBy;
	protected $ActionByIpAddress;
	protected $ActionDate;
	protected $Record;
	protected $ZoneName;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ZoneLogEntryDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ZoneLogEntryApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ZoneLogEntryApi
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
	* @param ZoneLogEntryDb|null $db
	* @return ZoneLogEntryDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAction (?string $Action = null) : self {
		$this->set("Action", $Action);
		return $this;
	}
	public function getAction () : ?string {
		return $this->get("Action", "string");
	}
	public function setActionBy (?string $ActionBy = null) : self {
		$this->set("ActionBy", $ActionBy);
		return $this;
	}
	public function getActionBy () : ?string {
		return $this->get("ActionBy", "string");
	}
	public function setActionByIpAddress (?string $ActionByIpAddress = null) : self {
		$this->set("ActionByIpAddress", $ActionByIpAddress);
		return $this;
	}
	public function getActionByIpAddress () : ?string {
		return $this->get("ActionByIpAddress", "string");
	}
	public function setActionDate (?\DateTime $ActionDate = null) : self {
		$this->set("ActionDate", $ActionDate);
		return $this;
	}
	public function getActionDate () : ?\DateTime {
		return $this->get("ActionDate", "\\DateTime");
	}
	public function setRecord (?\ascio\dns\Record $Record = null) : self {
		$this->set("Record", $Record);
		return $this;
	}
	public function getRecord () : ?\ascio\dns\Record {
		return $this->get("Record", "\\ascio\\dns\\Record");
	}
	public function createRecord () : \ascio\dns\Record {
		return $this->create ("Record", "\\ascio\\dns\\Record");
	}
	public function setZoneName (?string $ZoneName = null) : self {
		$this->set("ZoneName", $ZoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("ZoneName", "string");
	}
}