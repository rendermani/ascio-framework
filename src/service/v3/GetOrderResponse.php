<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrderResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetOrderResponseDb;
use ascio\api\v3\GetOrderResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetOrderResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "OrderInfo"];
	protected $_apiObjects=["Errors", "OrderInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $OrderInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetOrderResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetOrderResponseDb|null $db
	* @return GetOrderResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderInfo (?\ascio\v3\OrderInfo $OrderInfo = null) : \ascio\v3\GetOrderResponse {
		$this->set("OrderInfo", $OrderInfo);
		return $this;
	}
	public function getOrderInfo () : ?\ascio\v3\OrderInfo {
		return $this->get("OrderInfo", "\\ascio\\v3\\OrderInfo");
	}
	public function createOrderInfo () : \ascio\v3\OrderInfo {
		return $this->create ("OrderInfo", "\\ascio\\v3\\OrderInfo");
	}
}