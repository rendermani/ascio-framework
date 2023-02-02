<?php

// XSLT-WSDL-Client. Generated PHP class of CancelOrderRequest

namespace ascio\service\v3;
use ascio\db\v3\CancelOrderRequestDb;
use ascio\api\v3\CancelOrderRequestApi;
use ascio\base\v3\Base;


class CancelOrderRequest extends Base  {

	protected $_apiProperties=["OrderId"];
	protected $_apiObjects=[];
	protected $OrderId;

	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
}