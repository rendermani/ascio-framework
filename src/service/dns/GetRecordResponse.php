<?php

// XSLT-WSDL-Client. Generated PHP class of GetRecordResponse

namespace ascio\service\dns;
use ascio\db\dns\GetRecordResponseDb;
use ascio\api\dns\GetRecordResponseApi;
use ascio\base\dns\ResponseRootElement;


class GetRecordResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRecordResult", "record"];
	protected $_apiObjects=["GetRecordResult", "record"];
	protected $GetRecordResult;
	protected $record;

	public function setGetRecordResult (?\ascio\dns\Response $GetRecordResult = null) : self {
		$this->set("GetRecordResult", $GetRecordResult);
		return $this;
	}
	public function getGetRecordResult () : ?\ascio\dns\Response {
		return $this->get("GetRecordResult", "\\ascio\\dns\\Response");
	}
	public function createGetRecordResult () : \ascio\dns\Response {
		return $this->create ("GetRecordResult", "\\ascio\\dns\\Response");
	}
	public function setRecord (?\ascio\dns\Record $record = null) : self {
		$this->set("record", $record);
		return $this;
	}
	public function getRecord () : ?\ascio\dns\Record {
		return $this->get("record", "\\ascio\\dns\\Record");
	}
	public function createRecord () : \ascio\dns\Record {
		return $this->create ("record", "\\ascio\\dns\\Record");
	}
}