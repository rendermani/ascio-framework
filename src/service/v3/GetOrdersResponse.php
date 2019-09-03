<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrdersResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetOrdersResponseDb;
use ascio\api\v3\GetOrdersResponseApi;
use ascio\api\v3\AbstractResponseApi;


abstract class GetOrdersResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "OrdersInfo"];
	protected $_apiObjects=["Errors", "OrdersInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $OrdersInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetOrdersResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetOrdersResponseDb|null $db
	* @return GetOrdersResponseDb
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
	public function setOrdersInfo (?\ascio\v3\ArrayOfOrderInfo $OrdersInfo = null) : self {
		$this->set("OrdersInfo", $OrdersInfo);
		return $this;
	}
	public function getOrdersInfo () : ?\ascio\v3\ArrayOfOrderInfo {
		return $this->get("OrdersInfo", "\\ascio\\v3\\ArrayOfOrderInfo");
	}
	public function createOrdersInfo () : \ascio\v3\ArrayOfOrderInfo {
		return $this->create ("OrdersInfo", "\\ascio\\v3\\ArrayOfOrderInfo");
	}
}