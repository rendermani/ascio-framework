<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderType

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderTypeDb;
use ascio\api\v2\ArrayOfOrderTypeApi;


abstract class ArrayOfOrderType extends ArrayBase implements \Iterator, \ArrayAccess  {

	protected $_apiProperties=["OrderType"];
	protected $_apiObjects=[];
	protected $OrderType;

	/**
	* Getters and setters for API-Properties
	*/
	public function setOrderType (?Iterable $OrderType = null) : self {
		$this->set("OrderType", $OrderType);
		return $this;
	}
	public function getOrderType () : ?Iterable {
		return $this->get("OrderType", "string");
	}
	public function addOrderType () : string {
		return $this->add("OrderType","string",func_get_args());
	}
}