<?php

// XSLT-WSDL-Client. Generated DB-Model class of QueueItem. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class QueueItemApi extends ApiModel {

	public $idProperty="OrderId";
	public $parent;
	protected $properties=["Attachments", "DomainHandle", "DomainName", "Msg", "MsgId", "MsgType", "OrderId", "OrderStatus", "StatusList"];
	protected $objects=["Attachments", "StatusList"];

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