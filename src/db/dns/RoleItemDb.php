<?php

// XSLT-WSDL-Client. Generated DB-Model class of RoleItem. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbModel;


class RoleItemDb extends DbModel {
	protected $table="dns_RoleItem";
	public function getRights(){
		return $this->getRelationObject("dns","ArrayOfstring","Rights");
	}

}