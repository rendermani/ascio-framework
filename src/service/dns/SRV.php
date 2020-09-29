<?php

// XSLT-WSDL-Client. Generated PHP class of SRV

namespace ascio\service\dns;
use ascio\db\dns\SRVDb;
use ascio\api\dns\SRVApi;
use ascio\dns\Record;
use ascio\api\dns\RecordApi;


class SRV extends Record  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target", "UpdatedDate", "Port", "Priority", "Weight"];
	protected $_apiObjects=[];
	protected $_substituted = true;
	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;
	protected $UpdatedDate;
	protected $Port;
	protected $Priority;
	protected $Weight;

	public function setPort (?int $Port = null) : self {
		$this->set("Port", $Port);
		return $this;
	}
	public function getPort () : ?int {
		return $this->get("Port", "int");
	}
	public function setPriority (?int $Priority = null) : self {
		$this->set("Priority", $Priority);
		return $this;
	}
	public function getPriority () : ?int {
		return $this->get("Priority", "int");
	}
	public function setWeight (?int $Weight = null) : self {
		$this->set("Weight", $Weight);
		return $this;
	}
	public function getWeight () : ?int {
		return $this->get("Weight", "int");
	}
}