<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateRecord

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\UpdateRecordDb;
use ascio\api\dns\UpdateRecordApi;


abstract class UpdateRecord extends RequestRootElement  {

	protected $_apiProperties=["record"];
	protected $_apiObjects=["record"];
	protected $record;

	/**
	* Getters and setters for API-Properties
	*/
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