<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrder

namespace ascio\v3;
use ascio\base\v2\ArrayBase;


class ArrayOfOrder extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Order"];
	protected $_apiObjects=["Order"];
	protected $Order;

	public function setOrder (?Iterable $Order = null) : self {
		$this->set("Order", $Order);
		return $this;
	}
	public function getOrder () : ?Iterable {
		return $this->get("Order", "\\ascio\\v3\\AbstractOrder");
	}
	public function createOrder () : \ascio\v3\AbstractOrderRequest {
		return $this->create ("Order", "\\ascio\\v2\\Order");
	}
	public function addOrder ($item = null) : \ascio\v3\AbstractOrderRequest {
		return $this->addItem("Order","\\ascio\\v3\\AbstractOrderRequest",func_get_args());
	}
}