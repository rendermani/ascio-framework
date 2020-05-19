<?php

// XSLT-WSDL-Client. Generated DB-Model class of Zone. Can be copied and overwriten with own functions.

namespace ascio\api\dns;
use ascio\base\dns\ApiModel;


class ZoneApi extends ApiModel {

	public $parent;
	protected $properties=["CreatedDate", "Owner", "Records", "ZoneName"];
	protected $objects=["Records"];

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