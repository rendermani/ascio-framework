<?php

// XSLT-WSDL-Client. Generated DB-Model class of QueueItem. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class QueueItemApi extends ApiModel {

	public const IdProperty="OrderId";
	public $parent;
	public $client;
	protected $properties=["Attachments", "DomainHandle", "DomainName", "Msg", "MsgId", "MsgType", "OrderId", "OrderStatus", "StatusList"];
	protected $objects=["Attachments", "MsgType", "OrderStatus", "StatusList"];

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