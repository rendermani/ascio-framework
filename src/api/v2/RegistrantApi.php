<?php

// XSLT-WSDL-Client. Generated DB-Model class of Registrant. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class RegistrantApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["CreDate", "Status", "Handle", "Name", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Email", "Phone", "Fax", "RegistrantType", "VatNumber", "RegistrantDate", "NexusCategory", "RegistrantNumber", "Details"];
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