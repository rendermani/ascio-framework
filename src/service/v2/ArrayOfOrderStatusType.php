<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderStatusType

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderStatusTypeDb;
use ascio\api\v2\ArrayOfOrderStatusTypeApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfOrderStatusType extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

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
		return $this->addItem(func_get_args(),"string");
	}
	public function addOrderStatusTypes ($array) : self {
		return $this->add(func_get_args());
	}
}