<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDomainInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfDomainInfoDb;
use ascio\api\v3\ArrayOfDomainInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfDomainInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DomainInfo"];
	protected $_apiObjects=["DomainInfo"];
	protected $DomainInfo;

	public function setDomainInfo (?Iterable $DomainInfo = null) : self {
		$this->set("DomainInfo", $DomainInfo);
		return $this;
	}
	public function getDomainInfo () : ?Iterable {
		return $this->get("DomainInfo", "\\ascio\\v3\\DomainInfo");
	}
	public function createDomainInfo () : \ascio\v3\DomainInfo {
		return $this->create ("DomainInfo", "\\ascio\\v3\\DomainInfo");
	}
	public function addDomainInfo ($item = null) : \ascio\v3\DomainInfo {
		return $this->addItem("DomainInfo","\\ascio\\v3\\DomainInfo",func_get_args());
	}
}