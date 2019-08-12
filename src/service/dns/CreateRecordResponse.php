<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRecordResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\CreateRecordResponseDb;
use ascio\api\dns\CreateRecordResponseApi;


class CreateRecordResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateRecordResult", "recordId"];
	protected $_apiObjects=["CreateRecordResult"];
	protected $CreateRecordResult;
	protected $recordId;

	public function setCreateRecordResult (?\ascio\dns\Response $CreateRecordResult = null) : \ascio\dns\CreateRecordResponse {
		$this->set("CreateRecordResult", $CreateRecordResult);
		return $this;
	}
	public function getCreateRecordResult () : ?\ascio\dns\Response {
		return $this->get("CreateRecordResult", "\\ascio\\dns\\Response");
	}
	public function createCreateRecordResult () : \ascio\dns\Response {
		return $this->create ("CreateRecordResult", "\\ascio\\dns\\Response");
	}
	public function setRecordId (?int $recordId = null) : \ascio\dns\CreateRecordResponse {
		$this->set("recordId", $recordId);
		return $this;
	}
	public function getRecordId () : ?int {
		return $this->get("recordId", "int");
	}
}