<?php

// XSLT-WSDL-Client. Generated DB-Model class of AutoInstallSslOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class AutoInstallSslOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getAutoInstallSsl(){
		return $this->getRelationObject("v3","AutoInstallSsl","AutoInstallSsl");
	}

}