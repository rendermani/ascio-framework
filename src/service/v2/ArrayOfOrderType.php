<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderType

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfOrderTypeDb;
use ascio\api\v2\ArrayOfOrderTypeApi;
use ascio\base\v2\ArrayBase;


class ArrayOfOrderType extends ArrayBase implements \Iterator  {

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
	public function addOrderType ($item = null) : string {
		return $this->addItem("OrderType","string",func_get_args());
	}
}