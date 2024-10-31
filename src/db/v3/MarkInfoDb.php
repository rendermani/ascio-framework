<?php

// XSLT-WSDL-Client. Generated DB-Model class of MarkInfo. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbModel;


class MarkInfoDb extends DbModel {
	protected $table="v3_MarkInfo";
	public function getMark(){
		return $this->getRelationObject("v3","AbstractMark","Mark");
	}

}