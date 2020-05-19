<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetAccountTransactionsResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetAccountTransactionsResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getAccountTransactions(){
		return $this->getRelationObject("v3","ArrayOfAccountTransactions","AccountTransactions");
	}
	public function getVatPercentage(){
		return $this->getRelationObject("v3","double","VatPercentage");
	}

}