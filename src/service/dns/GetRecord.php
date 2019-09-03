<?php

// XSLT-WSDL-Client. Generated PHP class of GetRecord

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\GetRecordDb;
use ascio\api\dns\GetRecordApi;


abstract class GetRecord extends RequestRootElement  {

	protected $_apiProperties=["recordId"];
	protected $_apiObjects=[];
	protected $recordId;

	public function setRecordId (?int $recordId = null) : self {
		$this->set("recordId", $recordId);
		return $this;
	}
	public function getRecordId () : ?int {
		return $this->get("recordId", "int");
	}
}