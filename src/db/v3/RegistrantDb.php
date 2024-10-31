<?php

// XSLT-WSDL-Client. Generated DB-Model class of Registrant. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class RegistrantDb extends ContactDb {
	protected $table="v3_Registrant";
	public function getExtensions(){
		return $this->getRelationObject("v3","Extensions","Extensions");
	}

}