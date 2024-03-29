<?php

// XSLT-WSDL-Client. Generated DB-Model class of DefensiveInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class DefensiveInfoApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "Status", "Created", "Expires", "Name", "AuthInfo", "Encoding", "Owner", "Admin", "Tech", "Billing", "Reseller", "ObjectComment"];
	protected $objects=["Owner", "Admin", "Tech", "Billing", "Reseller"];

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