<?php

// XSLT-WSDL-Client. Generated DB-Model class of Message. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class MessageApi extends ApiModel {

	public $parent;
	public $client;
	protected $properties=["Attachments", "Body", "Created", "FromAddress", "Subject", "ToAddress", "Type"];
	protected $objects=["Attachments", "Type"];

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