<?php

// XSLT-WSDL-Client. Generated DB-Model class of Record. Can be copied and overwriten with own functions.

namespace ascio\api\dns;
use ascio\base\dns\ApiModel;


class RecordApi extends ApiModel {

	public $parent;
	protected $properties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate"];
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