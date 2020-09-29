<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;
use ascio\v3\GetOrderRequest;
use ascio\lib\Ascio;
use ascio\v3\OrderInfo;
use ascio\lib\AscioException;
use ascio\v3\AbstractOrderRequest;
use ascio\v3\GetOrderResponse;

class OrderInfoApi extends ApiModel {

	public $idProperty="OrderId";
	public $parent;
	protected $properties=["OrderId", "Status", "Created", "OrderRequest"];
	protected $objects=["OrderRequest"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($orderId = null) : ?GetOrderResponse {
		$orderId = $orderId ? $orderId : $this->parent()->getOrderId(); 
		$request = new GetOrderRequest();
		$request->setOrderId($orderId ?: $this->parent()->getOrderId());
		$result = Ascio::getClientV3()->getOrder($request)->init();
		$this->parent()->set($result->getOrderInfo());
		return $result;
	}
}