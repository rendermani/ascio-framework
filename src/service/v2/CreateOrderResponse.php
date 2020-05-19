<?php

// XSLT-WSDL-Client. Generated PHP class of CreateOrderResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\CreateOrderResponseDb;
use ascio\api\v2\CreateOrderResponseApi;


class CreateOrderResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateOrderResult", "order"];
	protected $_apiObjects=["CreateOrderResult", "order"];
	protected $CreateOrderResult;
	protected $order;

	public function setCreateOrderResult (?\ascio\v2\Response $CreateOrderResult = null) : self {
		$this->set("CreateOrderResult", $CreateOrderResult);
		return $this;
	}
	public function getCreateOrderResult () : ?\ascio\v2\Response {
		return $this->get("CreateOrderResult", "\\ascio\\v2\\Response");
	}
	public function createCreateOrderResult () : \ascio\v2\Response {
		return $this->create ("CreateOrderResult", "\\ascio\\v2\\Response");
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