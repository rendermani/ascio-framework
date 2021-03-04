<?php

// XSLT-WSDL-Client. Generated PHP class of GetPremiumDomainsResponse

namespace ascio\service\v3;
use ascio\db\v3\GetPremiumDomainsResponseDb;
use ascio\api\v3\GetPremiumDomainsResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetPremiumDomainsResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "PremiumDomainInfos"];
	protected $_apiObjects=["Errors", "PremiumDomainInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $PremiumDomainInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setPremiumDomainInfos (?\ascio\v3\ArrayOfPremiumDomainInfo $PremiumDomainInfos = null) : self {
		$this->set("PremiumDomainInfos", $PremiumDomainInfos);
		return $this;
	}
	public function getPremiumDomainInfos () : ?\ascio\v3\ArrayOfPremiumDomainInfo {
		return $this->get("PremiumDomainInfos", "\\ascio\\v3\\ArrayOfPremiumDomainInfo");
	}
	public function createPremiumDomainInfos () : \ascio\v3\ArrayOfPremiumDomainInfo {
		return $this->create ("PremiumDomainInfos", "\\ascio\\v3\\ArrayOfPremiumDomainInfo");
	}
}