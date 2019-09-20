<?php

// XSLT-WSDL-Client. Generated DB-Model class of DnsSecKey. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class DnsSecKeyApi extends ApiModel {

	public const IdProperty="Handle";
	public $parent;
	public $client;
	protected $properties=["Handle", "Status", "DigestAlgorithm", "DigestType", "Digest", "Protocol", "KeyType", "KeyAlgorithm", "KeyTag", "PublicKey", "CreDate"];
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