<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfPremiumDomainInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfPremiumDomainInfoDb;
use ascio\api\v3\ArrayOfPremiumDomainInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfPremiumDomainInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["PremiumDomainInfo"];
	protected $_apiObjects=["PremiumDomainInfo"];
	protected $PremiumDomainInfo;

	public function setPremiumDomainInfo (?Iterable $PremiumDomainInfo = null) : self {
		$this->set("PremiumDomainInfo", $PremiumDomainInfo);
		return $this;
	}
	public function getPremiumDomainInfo () : ?Iterable {
		return $this->get("PremiumDomainInfo", "\\ascio\\v3\\DomainInfo");
	}
	public function createPremiumDomainInfo () : \ascio\v3\DomainInfo {
		return $this->create ("PremiumDomainInfo", "\\ascio\\v3\\DomainInfo");
	}
	public function addPremiumDomainInfo ($item = null) : \ascio\v3\DomainInfo {
		return $this->addItem("PremiumDomainInfo","\\ascio\\v3\\DomainInfo",func_get_args());
	}
}