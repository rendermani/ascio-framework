<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfRoleItem. Can be copied and overwriten with own functions.

namespace ascio\db\dns;
use ascio\base\dns\DbArrayModel;


class ArrayOfRoleItemDb extends DbArrayModel {
	protected $table="dns_ArrayOfRoleItem";
	public function getRoleItem(){
		return $this->getRelationObject("dns","RoleItem","RoleItem");
	}

}