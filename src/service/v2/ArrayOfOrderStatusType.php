<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderStatusType

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderStatusTypeDb;
use ascio\api\v2\ArrayOfOrderStatusTypeApi;


abstract class ArrayOfOrderStatusType extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["OrderStatusType"];
	protected $_apiObjects=[];
	protected $OrderStatusType;

	/**
	* Getters and setters for API-Properties
	*/
	public function setOrderStatusType (?Iterable $OrderStatusType = null) : self {
		$this->set("OrderStatusType", $OrderStatusType);
		return $this;
	}
	public function getOrderStatusType () : ?Iterable {
		return $this->get("OrderStatusType", "string");
	}
	public function addOrderStatusType () : string {
		return $this->add("OrderStatusType","string",func_get_args());
	}
}