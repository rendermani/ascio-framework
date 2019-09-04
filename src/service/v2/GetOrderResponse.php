<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrderResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetOrderResponseDb;
use ascio\api\v2\GetOrderResponseApi;


abstract class GetOrderResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetOrderResult", "order"];
	protected $_apiObjects=["GetOrderResult", "order"];
	protected $GetOrderResult;
	protected $order;

	/**
	* Getters and setters for API-Properties
	*/
	public function setGetOrderResult (?\ascio\v2\Response $GetOrderResult = null) : self {
		$this->set("GetOrderResult", $GetOrderResult);
		return $this;
	}
	public function getGetOrderResult () : ?\ascio\v2\Response {
		return $this->get("GetOrderResult", "\\ascio\\v2\\Response");
	}
	public function createGetOrderResult () : \ascio\v2\Response {
		return $this->create ("GetOrderResult", "\\ascio\\v2\\Response");
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