<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class AbstractOrderRequestApi extends ApiModel {

	public $parent;
	protected $properties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options"];
	protected $objects=[];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
}