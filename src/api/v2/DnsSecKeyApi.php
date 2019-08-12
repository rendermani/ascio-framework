<?php

// XSLT-WSDL-Client. Generated DB-Model class of DnsSecKey. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class DnsSecKeyApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "Status", "DigestAlgorithm", "DigestType", "Digest", "Protocol", "KeyType", "KeyAlgorithm", "KeyTag", "PublicKey", "CreDate"];
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