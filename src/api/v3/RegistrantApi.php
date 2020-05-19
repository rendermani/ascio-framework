<?php

// XSLT-WSDL-Client. Generated DB-Model class of Registrant. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class RegistrantApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Type", "Details", "OrganisationNumber", "Extensions", "VatNumber", "NexusCategory"];
	protected $objects=["Extensions"];

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