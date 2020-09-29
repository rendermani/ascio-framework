<?php

// XSLT-WSDL-Client. Generated PHP class of SearchOrder

namespace ascio\service\v2;
use ascio\db\v2\SearchOrderDb;
use ascio\api\v2\SearchOrderApi;
use ascio\base\v2\RequestRootElement;


class SearchOrder extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "orderRequest"];
	protected $_apiObjects=["orderRequest"];
	protected $sessionId;
	protected $orderRequest;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setOrderRequest (?\ascio\v2\SearchOrderRequest $orderRequest = null) : self {
		$this->set("orderRequest", $orderRequest);
		return $this;
	}
	public function getOrderRequest () : ?\ascio\v2\SearchOrderRequest {
		return $this->get("orderRequest", "\\ascio\\v2\\SearchOrderRequest");
	}
	public function createOrderRequest () : \ascio\v2\SearchOrderRequest {
		return $this->create ("orderRequest", "\\ascio\\v2\\SearchOrderRequest");
	}
}