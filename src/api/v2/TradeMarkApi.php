<?php

// XSLT-WSDL-Client. Generated DB-Model class of TradeMark. Can be copied and overwriten with own functions.

namespace ascio\api\v2;
use ascio\base\v2\ApiModel;


class TradeMarkApi extends ApiModel {

	public $parent;
	protected $properties=["Name", "Country", "Date", "Number", "Type", "Contact", "ContactLanguage", "DocumentationLanguage", "SecondContact", "ThirdContact", "RegDate"];
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