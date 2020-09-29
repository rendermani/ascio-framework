<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfRecord. Can be copied and overwriten with own functions.

namespace ascio\api\dns;
use ascio\base\dns\ApiModel;
use ascio\dns\base\Rest;

class ArrayOfRecordApi extends ApiModel {

	public $parent;
	protected $properties=["Record"];
	protected $objects=["Record"];

	function create($data=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function update($data=null) {
		foreach($this->parent() as $record) {
            $record->api()->update();
        }
	}
	function delete($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
	function get($id=null) {
		throw new \ascio\lib\AscioException("Not implemented yet.");
	}
}