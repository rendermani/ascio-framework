<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameServer. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class NameServerApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["CreDate", "Handle", "HostName", "IpAddress", "Status", "IpV6Address", "Details"];
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