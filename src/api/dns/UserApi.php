<?php

// XSLT-WSDL-Client. Generated DB-Model class of User. Can be copied and overwriten with own functions.

namespace ascio\api\dns;
use ascio\base\dns\ApiModel;


class UserApi extends ApiModel {

	public $parent;
	protected $properties=["CreatedDate", "Email", "Name", "Password", "Role", "UpdatedDate", "UserName"];
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