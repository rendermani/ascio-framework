<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificateInfo. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class SslCertificateInfoApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "Status", "Created", "Expires", "CommonName", "ProductCode", "WebServerType", "ApproverEmail", "CSR", "Certificate", "Owner", "Admin", "Tech", "SanNames", "ObjectComment", "ValidationType", "SslProductName"];
	protected $objects=["Owner", "Admin", "Tech", "SanNames"];

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