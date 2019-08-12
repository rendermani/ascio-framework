<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetSslCertificateResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetSslCertificateResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getSslCertificateInfo(){
		return $this->getRelationObject("v3","SslCertificateInfo","SslCertificateInfo");
	}

}