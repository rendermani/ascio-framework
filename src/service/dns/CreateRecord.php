<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRecord

namespace ascio\service\dns;
use ascio\db\dns\CreateRecordDb;
use ascio\api\dns\CreateRecordApi;
use ascio\base\dns\RequestRootElement;


class CreateRecord extends RequestRootElement  {

	protected $_apiProperties=["zoneName", "record"];
	protected $_apiObjects=["record"];
	protected $zoneName;
	protected $record;

	public function setZoneName (?string $zoneName = null) : self {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
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