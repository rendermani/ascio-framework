<?php

// XSLT-WSDL-Client. Generated PHP class of GetMarkResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetMarkResponseDb;
use ascio\api\v3\GetMarkResponseApi;
use ascio\api\v3\AbstractResponseApi;


abstract class GetMarkResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "MarkInfo"];
	protected $_apiObjects=["Errors", "MarkInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $MarkInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetMarkResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetMarkResponseDb|null $db
	* @return GetMarkResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMarkInfo (?\ascio\v3\MarkInfo $MarkInfo = null) : self {
		$this->set("MarkInfo", $MarkInfo);
		return $this;
	}
	public function getMarkInfo () : ?\ascio\v3\MarkInfo {
		return $this->get("MarkInfo", "\\ascio\\v3\\MarkInfo");
	}
	public function createMarkInfo () : \ascio\v3\MarkInfo {
		return $this->create ("MarkInfo", "\\ascio\\v3\\MarkInfo");
	}
}