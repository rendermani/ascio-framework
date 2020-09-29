<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfZone

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfZoneDb;
use ascio\api\dns\ArrayOfZoneApi;
use ascio\base\dns\ArrayBase;


class ArrayOfZone extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Zone"];
	protected $_apiObjects=["Zone"];
	protected $Zone;

	public function setZone (?Iterable $Zone = null) : self {
		$this->set("Zone", $Zone);
		return $this;
	}
	public function getZone () : ?Iterable {
		return $this->get("Zone", "\\ascio\\dns\\Zone");
	}
	public function createZone () : \ascio\dns\Zone {
		return $this->create ("Zone", "\\ascio\\dns\\Zone");
	}
	public function addZone ($item = null) : \ascio\dns\Zone {
		return $this->addItem("Zone","\\ascio\\dns\\Zone",func_get_args());
	}
}