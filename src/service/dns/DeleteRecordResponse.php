<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRecordResponse

namespace ascio\service\dns;
use ascio\db\dns\DeleteRecordResponseDb;
use ascio\api\dns\DeleteRecordResponseApi;
use ascio\base\dns\ResponseRootElement;


class DeleteRecordResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteRecordResult"];
	protected $_apiObjects=["DeleteRecordResult"];
	protected $DeleteRecordResult;

	public function setDeleteRecordResult (?\ascio\dns\Response $DeleteRecordResult = null) : self {
		$this->set("DeleteRecordResult", $DeleteRecordResult);
		return $this;
	}
	public function getDeleteRecordResult () : ?\ascio\dns\Response {
		return $this->get("DeleteRecordResult", "\\ascio\\dns\\Response");
	}
	public function createDeleteRecordResult () : \ascio\dns\Response {
		return $this->create ("DeleteRecordResult", "\\ascio\\dns\\Response");
	}
}