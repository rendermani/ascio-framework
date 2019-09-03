<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderType

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfOrderTypeDb;
use ascio\api\v3\ArrayOfOrderTypeApi;


abstract class ArrayOfOrderType extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["OrderType"];
	protected $_apiObjects=[];
	protected $OrderType;

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