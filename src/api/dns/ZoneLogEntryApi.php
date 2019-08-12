<?php

// XSLT-WSDL-Client. Generated DB-Model class of ZoneLogEntry. Can be copied and overwriten with own functions.

namespace ascio\api\dns;
use ascio\base\dns\ApiModel;


class ZoneLogEntryApi extends ApiModel {

	public $parent;
	protected $properties=["Action", "ActionBy", "ActionByIpAddress", "ActionDate", "Record", "ZoneName"];
	protected $objects=["Record"];

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