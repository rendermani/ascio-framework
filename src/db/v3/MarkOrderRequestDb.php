<?php

// XSLT-WSDL-Client. Generated DB-Model class of MarkOrderRequest. Can be copied and overwriten with own functions.

namespace ascio\db\v3;


class MarkOrderRequestDb extends AbstractOrderRequestDb {
	protected $table="v3_AbstractOrderRequest";
	public function getMark(){
		return $this->getRelationObject("v3","AbstractMark","Mark");
	}
	public function getDocuments(){
		return $this->getRelationObject("v3","ArrayOfMarkOrderDocument","Documents");
	}

}