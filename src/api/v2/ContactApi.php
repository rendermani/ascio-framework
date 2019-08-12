<?php

// XSLT-WSDL-Client. Generated DB-Model class of Contact. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class ContactApi extends ApiModel {

	public $idProperty="Handle";
	public $parent;
	protected $properties=["CreDate", "Status", "Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "PostalCode", "City", "State", "CountryCode", "Email", "Phone", "Fax", "Type", "Details", "OrganisationNumber"];
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