<?php

// XSLT-WSDL-Client. Generated DB-Model class of AbstractMark. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class AbstractMarkApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "MarkName", "MarkId", "AuthInfo", "ServiceType", "GoodsAndServicesDescription", "Labels", "ClaimEmailNotification1", "ClaimEmailNotification2", "ClaimEmailNotification3", "ClaimEmailNotification4", "ClaimEmailNotification5", "NotificationFrequency", "Owner", "Reseller", "Extensions", "ObjectComment"];
	protected $objects=["Labels", "Owner", "Reseller", "Extensions"];

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