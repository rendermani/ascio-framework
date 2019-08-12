<?php

// XSLT-WSDL-Client. Generated PHP class of CreateZone

namespace ascio\service\dns;
use ascio\base\dns\RequestRootElement;
use ascio\db\dns\CreateZoneDb;
use ascio\api\dns\CreateZoneApi;


class CreateZone extends RequestRootElement  {

	protected $_apiProperties=["zoneName", "owner", "records"];
	protected $_apiObjects=["records"];
	protected $zoneName;
	protected $owner;
	protected $records;

	public function setZoneName (?string $zoneName = null) : \ascio\dns\CreateZone {
		$this->set("zoneName", $zoneName);
		return $this;
	}
	public function getZoneName () : ?string {
		return $this->get("zoneName", "string");
	}
	public function setOwner (?string $owner = null) : \ascio\dns\CreateZone {
		$this->set("owner", $owner);
		return $this;
	}
	public function getOwner () : ?string {
		return $this->get("owner", "string");
	}
	public function setRecords (?\ascio\dns\ArrayOfRecord $records = null) : \ascio\dns\CreateZone {
		$this->set("records", $records);
		return $this;
	}
	public function getRecords () : ?\ascio\dns\ArrayOfRecord {
		return $this->get("records", "\\ascio\\dns\\ArrayOfRecord");
	}
	public function createRecords () : \ascio\dns\ArrayOfRecord {
		return $this->create ("records", "\\ascio\\dns\\ArrayOfRecord");
	}
}