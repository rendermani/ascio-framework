<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderInfo

namespace ascio\service\v3;
use ascio\base\v3\DbArrayBase;
use ascio\db\v3\ArrayOfOrderInfoDb;
use ascio\api\v3\ArrayOfOrderInfoApi;


abstract class ArrayOfOrderInfo extends DbArrayBase  {

	protected $_apiProperties=["OrderInfo"];
	protected $_apiObjects=["OrderInfo"];
	protected $OrderInfo;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ArrayOfOrderInfoDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ArrayOfOrderInfoDb|null $db
	* @return ArrayOfOrderInfoDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderInfo (?Iterable $OrderInfo = null) : self {
		$this->set("OrderInfo", $OrderInfo);
		return $this;
	}
	public function getOrderInfo () : ?Iterable {
		return $this->get("OrderInfo", "\\ascio\\v3\\OrderInfo");
	}
	public function createOrderInfo () : \ascio\v3\OrderInfo {
		return $this->create ("OrderInfo", "\\ascio\\v3\\OrderInfo");
	}
	public function addOrderInfo () : \ascio\v3\OrderInfo {
		return $this->add("OrderInfo","\\ascio\\v3\\OrderInfo",func_get_args());
	}
}