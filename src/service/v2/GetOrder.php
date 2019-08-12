<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrder

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\GetOrderDb;
use ascio\api\v2\GetOrderApi;


class GetOrder extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "orderId"];
	protected $_apiObjects=[];
	protected $sessionId;
	protected $orderId;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\GetOrder {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setOrderId (?string $orderId = null) : \ascio\v2\GetOrder {
		$this->set("orderId", $orderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("orderId", "string");
	}
}