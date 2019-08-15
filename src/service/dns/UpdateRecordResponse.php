<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateRecordResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\UpdateRecordResponseDb;
use ascio\api\dns\UpdateRecordResponseApi;


class UpdateRecordResponse extends ResponseRootElement  {

	protected $_apiProperties=["UpdateRecordResult"];
	protected $_apiObjects=["UpdateRecordResult"];
	protected $UpdateRecordResult;

	public function setUpdateRecordResult (?\ascio\dns\Response $UpdateRecordResult = null) : self {
		$this->set("UpdateRecordResult", $UpdateRecordResult);
		return $this;
	}
	public function getUpdateRecordResult () : ?\ascio\dns\Response {
		return $this->get("UpdateRecordResult", "\\ascio\\dns\\Response");
	}
	public function createUpdateRecordResult () : \ascio\dns\Response {
		return $this->create ("UpdateRecordResult", "\\ascio\\dns\\Response");
	}
}