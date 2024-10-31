<?php

// XSLT-WSDL-Client. Generated DB-Model class of ArrayOfMarkOrderDocument. Can be copied and overwriten with own functions.

namespace ascio\db\v3;
use ascio\base\v3\DbArrayModel;


class ArrayOfMarkOrderDocumentDb extends DbArrayModel {
	protected $table="v3_ArrayOfMarkOrderDocument";
	public function getMarkOrderDocument(){
		return $this->getRelationObject("v3","MarkOrderDocument","MarkOrderDocument");
	}

}