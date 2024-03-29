<?php

// XSLT-WSDL-Client. Generated PHP class of SalesLineGroup

namespace ascio\service\v3;
use ascio\db\v3\SalesLineGroupDb;
use ascio\api\v3\SalesLineGroupApi;
use ascio\base\v3\DbBase;


class SalesLineGroup extends DbBase  {

	protected $_apiProperties=["ProductName", "Sum", "Units"];
	protected $_apiObjects=[];
	protected $ProductName;
	protected $Sum;
	protected $Units;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SalesLineGroupDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new SalesLineGroupApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return SalesLineGroupApi
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
	* @param SalesLineGroupDb|null $db
	* @return SalesLineGroupDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setProductName (?string $ProductName = null) : self {
		$this->set("ProductName", $ProductName);
		return $this;
	}
	public function getProductName () : ?string {
		return $this->get("ProductName", "string");
	}
	public function setSum (?float $Sum = null) : self {
		$this->set("Sum", $Sum);
		return $this;
	}
	public function getSum () : ?float {
		return $this->get("Sum", "float");
	}
	public function setUnits (?int $Units = null) : self {
		$this->set("Units", $Units);
		return $this;
	}
	public function getUnits () : ?int {
		return $this->get("Units", "int");
	}
}