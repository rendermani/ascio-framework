<?php

// XSLT-WSDL-Client. Generated PHP class of GetDefensiveResponse

namespace ascio\service\v3;
use ascio\db\v3\GetDefensiveResponseDb;
use ascio\api\v3\GetDefensiveResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetDefensiveResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "DefensiveInfo"];
	protected $_apiObjects=["Errors", "DefensiveInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $DefensiveInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetDefensiveResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetDefensiveResponseDb|null $db
	* @return GetDefensiveResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setDefensiveInfo (?\ascio\v3\DefensiveInfo $DefensiveInfo = null) : self {
		$this->set("DefensiveInfo", $DefensiveInfo);
		return $this;
	}
	public function getDefensiveInfo () : ?\ascio\v3\DefensiveInfo {
		return $this->get("DefensiveInfo", "\\ascio\\v3\\DefensiveInfo");
	}
	public function createDefensiveInfo () : \ascio\v3\DefensiveInfo {
		return $this->create ("DefensiveInfo", "\\ascio\\v3\\DefensiveInfo");
	}
}