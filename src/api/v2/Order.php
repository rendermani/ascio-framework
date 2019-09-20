<?php

// XSLT-WSDL-Client. Generated DB-Model class of Order. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class OrderApi extends ApiModel {

	public const IdProperty="OrderId";
	public $parent;
	public $client;
	protected $properties=["OrderId", "Type", "AccountReference", "Status", "TransactionComment", "Comments", "Options", "LocalPresence", "Batch", "Documentation", "Domain", "CreDate", "AgreedPrice"];
	protected $objects=["Type", "Status", "Domain"];

	function create() {
		throw new Exception("Not implemented yet.");
	}
	function update() {
		throw new Exception("Not implemented yet.");
	}
	function delete() {
		throw new Exception("Not implemented yet.");
	}
	function get() {
		throw new Exception("Not implemented yet.");
	}
}