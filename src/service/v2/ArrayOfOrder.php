<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrder

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderDb;
use ascio\api\v2\ArrayOfOrderApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfOrder extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["Order"];
	protected $_apiObjects=["Order"];
	protected $Order;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\Order {
		return parent::current();
	}
	public function first() : \ascio\v2\Order {
		return parent::first();
	}
	public function last() : \ascio\v2\Order {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Order {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
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
		return $this->addItem(func_get_args(),"\\ascio\\v2\\Order");
	}
	public function addOrders ($array) : self {
		return $this->add(func_get_args());
	}
}