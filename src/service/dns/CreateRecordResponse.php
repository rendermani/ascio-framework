<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRecordResponse

namespace ascio\service\dns;
use ascio\db\dns\CreateRecordResponseDb;
use ascio\api\dns\CreateRecordResponseApi;
use ascio\base\dns\ResponseRootElement;


class CreateRecordResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateRecordResult", "recordId"];
	protected $_apiObjects=["CreateRecordResult"];
	protected $CreateRecordResult;
	protected $recordId;

	public function setCreateRecordResult (?\ascio\dns\Response $CreateRecordResult = null) : self {
		$this->set("CreateRecordResult", $CreateRecordResult);
		return $this;
	}
	public function getCreateRecordResult () : ?\ascio\dns\Response {
		return $this->get("CreateRecordResult", "\\ascio\\dns\\Response");
	}
	public function createCreateRecordResult () : \ascio\dns\Response {
		return $this->create ("CreateRecordResult", "\\ascio\\dns\\Response");
	}
	public function setRecordId (?int $recordId = null) : self {
		$this->set("recordId", $recordId);
		return $this;
	}
	public function getRecordId () : ?int {
		return $this->get("recordId", "int");
	}
}