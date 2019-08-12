<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameWatchInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class NameWatchInfoApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "Status", "Created", "Expires", "Name", "NotificationFrequency", "Tier", "EmailNotification1", "EmailNotification2", "EmailNotification3", "EmailNotification4", "EmailNotification5", "Owner", "Reseller", "ObjectComment"];
	protected $objects=["Owner", "Reseller"];

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