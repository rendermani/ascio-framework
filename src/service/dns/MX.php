<?php

// XSLT-WSDL-Client. Generated PHP class of MX

namespace ascio\service\dns;
use ascio\db\dns\MXDb;
use ascio\api\dns\MXApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class MX extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "Priority"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $Priority;

	public function setPriority (?int $Priority = null) : self {
		$this->set("Priority", $Priority);
		return $this;
	}
	public function getPriority () : ?int {
		return $this->get("Priority", "int");
	}
}