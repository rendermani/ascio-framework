<?php

// XSLT-WSDL-Client. Generated PHP class of CreateOrder

namespace ascio\service\v2;
use ascio\db\v2\CreateOrderDb;
use ascio\api\v2\CreateOrderApi;
use ascio\base\v2\RequestRootElement;


class CreateOrder extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "order"];
	protected $_apiObjects=["order"];
	protected $sessionId;
	protected $order;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setOrder (?\ascio\v2\Order $order = null) : self {
		$this->set("order", $order);
		return $this;
	}
	public function getOrder () : ?\ascio\v2\Order {
		return $this->get("order", "\\ascio\\v2\\Order");
	}
	public function createOrder () : \ascio\v2\Order {
		return $this->create ("order", "\\ascio\\v2\\Order");
	}
}