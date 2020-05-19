<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetCreditNoteResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetCreditNoteResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getAmount(){
		return $this->getRelationObject("v3","double","Amount");
	}
	public function getVatPercentage(){
		return $this->getRelationObject("v3","double","VatPercentage");
	}
	public function getSalesLineGroups(){
		return $this->getRelationObject("v3","ArrayOfSalesLineGroups","SalesLineGroups");
	}

}