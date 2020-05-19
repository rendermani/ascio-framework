<?php

// XSLT-WSDL-Client. Generated DB-Model class of AccountTransaction. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class AccountTransactionDb extends DbModel {
	protected $table="v3_AccountTransaction";
	public function getAmount(){
		return $this->getRelationObject("v3","double","Amount");
	}
	public function getBalance(){
		return $this->getRelationObject("v3","double","Balance");
	}
	public function getVatPercentage(){
		return $this->getRelationObject("v3","double","VatPercentage");
	}

}