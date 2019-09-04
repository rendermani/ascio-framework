<?php

// XSLT-WSDL-Client. Generated PHP class of SearchOrderResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\SearchOrderResponseDb;
use ascio\api\v2\SearchOrderResponseApi;


abstract class SearchOrderResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchOrderResult", "totalOrders", "orders"];
	protected $_apiObjects=["SearchOrderResult", "orders"];
	protected $SearchOrderResult;
	protected $totalOrders;
	protected $orders;

	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchOrderResult (?\ascio\v2\Response $SearchOrderResult = null) : self {
		$this->set("SearchOrderResult", $SearchOrderResult);
		return $this;
	}
	public function getSearchOrderResult () : ?\ascio\v2\Response {
		return $this->get("SearchOrderResult", "\\ascio\\v2\\Response");
	}
	public function createSearchOrderResult () : \ascio\v2\Response {
		return $this->create ("SearchOrderResult", "\\ascio\\v2\\Response");
	}
	public function setTotalOrders (?int $totalOrders = null) : self {
		$this->set("totalOrders", $totalOrders);
		return $this;
	}
	public function getTotalOrders () : ?int {
		return $this->get("totalOrders", "int");
	}
	public function setOrders (?\ascio\v2\ArrayOfOrder $orders = null) : self {
		$this->set("orders", $orders);
		return $this;
	}
	public function getOrders () : ?\ascio\v2\ArrayOfOrder {
		return $this->get("orders", "\\ascio\\v2\\ArrayOfOrder");
	}
	public function createOrders () : \ascio\v2\ArrayOfOrder {
		return $this->create ("orders", "\\ascio\\v2\\ArrayOfOrder");
	}
}