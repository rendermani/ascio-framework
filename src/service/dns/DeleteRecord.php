<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRecord

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\DeleteRecordDb;
use ascio\api\dns\DeleteRecordApi;


abstract class DeleteRecord extends RequestRootElement  {

	protected $_apiProperties=["recordId"];
	protected $_apiObjects=[];
	protected $recordId;

	/**
	* Getters and setters for API-Properties
	*/
	public function setRecordId (?int $recordId = null) : self {
		$this->set("recordId", $recordId);
		return $this;
	}
	public function getRecordId () : ?int {
		return $this->get("recordId", "int");
	}
}