<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetSslCertificate. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class GetSslCertificateDb extends DbModel {
	protected $table="v3_GetSslCertificate";
	public function getrequest(){
		return $this->getRelationObject("v3","GetSslCertificateRequest","request");
	}

}