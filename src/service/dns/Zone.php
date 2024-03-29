<?php

// XSLT-WSDL-Client. Generated PHP class of Zone

namespace ascio\service\dns;
use ascio\db\dns\ZoneDb;
use ascio\api\dns\ZoneApi;
use ascio\base\dns\DbBase;


class Zone extends DbBase  {

	protected $_apiProperties=["CreatedDate", "IsSlave", "MasterIp", "Owner", "Records", "ZoneName"];
	protected $_apiObjects=["Records"];
	protected $CreatedDate;
	protected $IsSlave;
	protected $MasterIp;
	protected $Owner;
	protected $Records;
	protected $ZoneName;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ZoneDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ZoneApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ZoneApi
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
	* @param ZoneDb|null $db
	* @return ZoneDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCreatedDate (?\DateTime $CreatedDate = null) : self {
		$this->set("CreatedDate", $CreatedDate);
		return $this;
	}
	public function getCreatedDate () : ?\DateTime {
		return $this->get("CreatedDate", "\\DateTime");
	}
	public function setIsSlave (?bool $IsSlave = null) : self {
		$this->set("IsSlave", $IsSlave);
		return $this;
	}
	public function getIsSlave () : ?bool {
		return $this->get("IsSlave", "bool");
	}
	public function setMasterIp (?string $MasterIp = null) : self {
		$this->set("MasterIp", $MasterIp);
		return $this;
	}
	public function getMasterIp () : ?string {
		return $this->get("MasterIp", "string");
	}
	public function setOwner (?string $Owner = null) : self {
		$this->set("Owner", $Owner);
		return $this;
	}
	public function getOwner () : ?string {
		return $this->get("Owner", "string");
	}
	public function setRecords (?\ascio\dns\ArrayOfRecord $Records = null) : self {
		$this->set("Records", $Records);
		return $this;
	}
	public function getRecords () : ?\ascio\dns\ArrayOfRecord {
		return $this->get("Records", "\\ascio\\dns\\ArrayOfRecord");
	}
	public function createRecords () : \ascio\dns\ArrayOfRecord {
		return $this->create ("Records", "\\ascio\\dns\\ArrayOfRecord");
	}
	public function setZoneName (?string $ZoneName = null) : self {
		$this->set("ZoneName", $ZoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("ZoneName", "string");
	}
}