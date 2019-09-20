<?php

// XSLT-WSDL-Client. Generated DB-Model class of Contact. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class ContactApi extends ApiModel {

	public const IdProperty="Handle";
	public $parent;
	public $client;
	protected $properties=["CreDate", "Status", "Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "PostalCode", "City", "State", "CountryCode", "Email", "Phone", "Fax", "Type", "Details", "OrganisationNumber"];
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