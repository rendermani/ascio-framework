<?php

// XSLT-WSDL-Client. Generated DB-Model class of SslCertificateOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class SslCertificateOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getSslCertificate(){
		return $this->getRelationObject("v3","SslCertificate","SslCertificate");
	}

}