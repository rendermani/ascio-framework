<?php

// XSLT-WSDL-Client. Generated PHP class of GetSalesLinesResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetSalesLinesResponseDb;
use ascio\api\v3\GetSalesLinesResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetSalesLinesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "SalesLines"];
	protected $_apiObjects=["Errors", "SalesLines"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $SalesLines;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetSalesLinesResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetSalesLinesResponseDb|null $db
	* @return GetSalesLinesResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setSalesLines (?\ascio\v3\ArrayOfSalesLines $SalesLines = null) : self {
		$this->set("SalesLines", $SalesLines);
		return $this;
	}
	public function getSalesLines () : ?\ascio\v3\ArrayOfSalesLines {
		return $this->get("SalesLines", "\\ascio\\v3\\ArrayOfSalesLines");
	}
	public function createSalesLines () : \ascio\v3\ArrayOfSalesLines {
		return $this->create ("SalesLines", "\\ascio\\v3\\ArrayOfSalesLines");
	}
}