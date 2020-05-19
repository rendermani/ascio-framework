<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderHistory

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfOrderHistoryDb;
use ascio\api\v3\ArrayOfOrderHistoryApi;


class ArrayOfOrderHistory extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["OrderHistory"];
	protected $_apiObjects=["OrderHistory"];
	protected $OrderHistory;

	public function setOrderHistory (?Iterable $OrderHistory = null) : self {
		$this->set("OrderHistory", $OrderHistory);
		return $this;
	}
	public function getOrderHistory () : ?Iterable {
		return $this->get("OrderHistory", "\\ascio\\v3\\OrderHistory");
	}
	public function createOrderHistory () : \ascio\v3\OrderHistory {
		return $this->create ("OrderHistory", "\\ascio\\v3\\OrderHistory");
	}
	public function addOrderHistory () : \ascio\v3\OrderHistory {
		return $this->add("OrderHistory","\\ascio\\v3\\OrderHistory",func_get_args());
	}
}