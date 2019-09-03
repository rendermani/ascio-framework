<?php

// XSLT-WSDL-Client. Generated PHP class of PagingInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\PagingInfoDb;
use ascio\api\v3\PagingInfoApi;


abstract class PagingInfo extends DbBase  {

	protected $_apiProperties=["PageIndex", "PageSize"];
	protected $_apiObjects=[];
	protected $PageIndex;
	protected $PageSize;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PagingInfoDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param PagingInfoDb|null $db
	* @return PagingInfoDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setPageIndex (?int $PageIndex = null) : self {
		$this->set("PageIndex", $PageIndex);
		return $this;
	}
	public function getPageIndex () : ?int {
		return $this->get("PageIndex", "int");
	}
	public function setPageSize (?int $PageSize = null) : self {
		$this->set("PageSize", $PageSize);
		return $this;
	}
	public function getPageSize () : ?int {
		return $this->get("PageSize", "int");
	}
}