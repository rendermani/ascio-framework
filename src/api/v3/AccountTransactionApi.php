<?php

// XSLT-WSDL-Client. Generated DB-Model class of AccountTransaction. Can be copied and overwriten with own functions.

namespace ascio\api\v3;
use ascio\base\v3\ApiModel;


class AccountTransactionApi extends ApiModel {

	public $parent;
	protected $properties=["AccountTransactionType", "Created", "Amount", "Balance", "InvoiceNo", "CreditNo", "Note", "CreatedBy", "VatPercentage"];
	protected $objects=["Amount", "Balance", "VatPercentage"];

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