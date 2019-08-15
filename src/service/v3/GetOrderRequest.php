<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrderRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetOrderRequestDb;
use ascio\api\v3\GetOrderRequestApi;


class GetOrderRequest extends DbBase  {

	protected $_apiProperties=["OrderId"];
	protected $_apiObjects=[];
	protected $OrderId;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetOrderRequestDb|null $db
	* @return GetOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
}