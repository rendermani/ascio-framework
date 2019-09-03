<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrder

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderDb;
use ascio\api\v2\ArrayOfOrderApi;


abstract class ArrayOfOrder extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Order"];
	protected $_apiObjects=["Order"];
	protected $Order;

	public function setOrder (?Iterable $Order = null) : self {
		$this->set("Order", $Order);
		return $this;
	}
	public function getOrder () : ?Iterable {
		return $this->get("Order", "\\ascio\\v2\\Order");
	}
	public function createOrder () : \ascio\v2\Order {
		return $this->create ("Order", "\\ascio\\v2\\Order");
	}
	public function addOrder () : \ascio\v2\Order {
		return $this->add("Order","\\ascio\\v2\\Order",func_get_args());
	}
}