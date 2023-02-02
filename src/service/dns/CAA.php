<?php

// XSLT-WSDL-Client. Generated PHP class of CAA

namespace ascio\service\dns;
use ascio\db\dns\CAADb;
use ascio\api\dns\CAAApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class CAA extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "Flag"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $Flag;

	public function setFlag (?int $Flag = null) : self {
		$this->set("Flag", $Flag);
		return $this;
	}
	public function getFlag () : ?int {
		return $this->get("Flag", "int");
	}
}