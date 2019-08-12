<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfOrderStatusType

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfOrderStatusTypeDb;
use ascio\api\v2\ArrayOfOrderStatusTypeApi;


class ArrayOfOrderStatusType extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["OrderStatusType"];
	protected $_apiObjects=[];
	protected $OrderStatusType;

	public function setOrderStatusType (?Iterable $OrderStatusType = null) : \ascio\v2\ArrayOfOrderStatusType {
		$this->set("OrderStatusType", $OrderStatusType);
		return $this;
	}
	public function getOrderStatusType () : ?Iterable {
		return $this->get("OrderStatusType", "string");
	}
	public function addOrderStatusType () : ?string {
		return $this->add("OrderStatusType","string",func_get_args());
	}
}