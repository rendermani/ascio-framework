<?php

// XSLT-WSDL-Client. Generated DB-Model class of GetSalesLinesResponse. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class GetSalesLinesResponseDb extends AbstractResponseDb {
	protected $table="v3_AbstractResponse";
	public function getErrors(){
		return $this->getRelationObject("v3","ArrayOfstring","Errors");
	}
	public function getSalesLines(){
		return $this->getRelationObject("v3","ArrayOfSalesLines","SalesLines");
	}

}