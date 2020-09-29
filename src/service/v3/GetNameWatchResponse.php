<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameWatchResponse

namespace ascio\service\v3;
use ascio\db\v3\GetNameWatchResponseDb;
use ascio\api\v3\GetNameWatchResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetNameWatchResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "NameWatchInfo"];
	protected $_apiObjects=["Errors", "NameWatchInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $NameWatchInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetNameWatchResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetNameWatchResponseDb|null $db
	* @return GetNameWatchResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setNameWatchInfo (?\ascio\v3\NameWatchInfo $NameWatchInfo = null) : self {
		$this->set("NameWatchInfo", $NameWatchInfo);
		return $this;
	}
	public function getNameWatchInfo () : ?\ascio\v3\NameWatchInfo {
		return $this->get("NameWatchInfo", "\\ascio\\v3\\NameWatchInfo");
	}
	public function createNameWatchInfo () : \ascio\v3\NameWatchInfo {
		return $this->create ("NameWatchInfo", "\\ascio\\v3\\NameWatchInfo");
	}
}