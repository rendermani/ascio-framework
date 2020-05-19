<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;
use ascio\lib\Ascio;

class OrderApi extends ApiModel {

	public $idProperty="OrderId";
	public $parent;
	protected $properties=["OrderId", "Type", "AccountReference", "Status", "TransactionComment", "Comments", "Options", "LocalPresence", "Batch", "Documentation", "Domain", "CreDate", "AgreedPrice"];
	protected $objects=["Domain"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($orderId=null) {
		$orderId = $orderId ? $orderId : $this->parent()->getOrderId(); 
		$result = Ascio::getClientV2()->getOrder($orderId);
		$this->parent()->set($result->getOrder());
		return $result->getGetOrderResult();
	}
}