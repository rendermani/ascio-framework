<?php

// XSLT-WSDL-Client. Generated DB-Model class of NameServer. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class NameServerApi extends ApiModel {

	public const IdProperty="Handle";
	public $parent;
	public $client;
	protected $properties=["CreDate", "Handle", "HostName", "IpAddress", "Status", "IpV6Address", "Details"];
	protected $objects=[];

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