<?php

// XSLT-WSDL-Client. Generated PHP class of CancelOrder

namespace ascio\service\v3;
use ascio\db\v3\CancelOrderDb;
use ascio\api\v3\CancelOrderApi;
use ascio\base\v3\RequestRootElement;


class CancelOrder extends RequestRootElement  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function setRequest (?\ascio\v3\CancelOrderRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\CancelOrderRequest {
		return $this->get("request", "\\ascio\\v3\\CancelOrderRequest");
	}
	public function createRequest () : \ascio\v3\CancelOrderRequest {
		return $this->create ("request", "\\ascio\\v3\\CancelOrderRequest");
	}
}