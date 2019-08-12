<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetAutoInstallSslResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetAutoInstallSslResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getAutoInstallSslInfo(){
		return $this->getRelationObject("v3","AutoInstallSslInfo","AutoInstallSslInfo");
	}

}