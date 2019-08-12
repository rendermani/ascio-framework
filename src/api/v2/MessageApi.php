<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class MessageApi extends ApiModel {

	public $parent;
	protected $properties=["Attachments", "Body", "Created", "FromAddress", "Subject", "ToAddress", "Type"];
	protected $objects=["Attachments"];

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