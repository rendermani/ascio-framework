<?php

// XSLT-WSDL-Client. Generated DB-Model class of User. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class UserDb extends DbModel {
	protected $table="v3_User";
	public function getUserRights(){
		return $this->getRelationObject("v3","ArrayOfstring","UserRights");
	}

}