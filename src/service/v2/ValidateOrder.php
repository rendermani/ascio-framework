<?php

// XSLT-WSDL-Client. Generated PHP class of ValidateOrder

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\ValidateOrderDb;
use ascio\api\v2\ValidateOrderApi;


class ValidateOrder extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "order"];
	protected $_apiObjects=["order"];
	protected $sessionId;
	protected $order;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\ValidateOrder {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setOrder (?\ascio\v2\Order $order = null) : \ascio\v2\ValidateOrder {
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