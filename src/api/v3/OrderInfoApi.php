<?php

// XSLT-WSDL-Client. Generated DB-Model class of OrderInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;
use ascio\v3\GetOrderRequest;
use ascio\lib\Ascio;
use ascio\v3\OrderInfo;
use ascio\lib\AscioException;
use ascio\v3\AbstractOrderRequest;

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
	function get($orderId = null) : ?OrderInfo {
		$orderId = $orderId ? $orderId : $this->parent()->getOrderId(); 
		$request = new GetOrderRequest();
		$request->setOrderId($orderId);
		$order = Ascio::getClientV3()->getOrder($request)->init();
		if(get_class($order->getOrderInfo()->getOrderRequest()) ==  "ascio\\v3\\AbstractOrderRequest") {
			throw new AscioException("Order is a domain order",403); 
		}
		$this->parent()->set($order->getOrderInfo());
		return $order->getOrderInfo();
	}
}