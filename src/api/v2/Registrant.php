<?php

// XSLT-WSDL-Client. Generated DB-Model class of Registrant. Can be copied and overwriten with own functions.

namespace ascio\api\v2;


class RegistrantApi extends ApiModel {

	public const IdProperty="Handle";
	public $parent;
	public $client;
	protected $properties=["CreDate", "Status", "Handle", "Name", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Email", "Phone", "Fax", "RegistrantType", "VatNumber", "RegistrantDate", "NexusCategory", "RegistrantNumber", "Details"];
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