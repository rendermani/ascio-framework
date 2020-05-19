<?php

// XSLT-WSDL-Client. Generated DB-Model class of MarkInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class MarkInfoApi extends ApiModel {

	public $parent;
	protected $properties=["Status", "Created", "Expires", "Mark", "Smd"];
	protected $objects=["Mark"];

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