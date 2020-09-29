<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomainsResponse

namespace ascio\service\v3;
use ascio\db\v3\GetDomainsResponseDb;
use ascio\api\v3\GetDomainsResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetDomainsResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "DomainInfos"];
	protected $_apiObjects=["Errors", "DomainInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $DomainInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setDomainInfos (?\ascio\v3\ArrayOfDomainInfo $DomainInfos = null) : self {
		$this->set("DomainInfos", $DomainInfos);
		return $this;
	}
	public function getDomainInfos () : ?\ascio\v3\ArrayOfDomainInfo {
		return $this->get("DomainInfos", "\\ascio\\v3\\ArrayOfDomainInfo");
	}
	public function createDomainInfos () : \ascio\v3\ArrayOfDomainInfo {
		return $this->create ("DomainInfos", "\\ascio\\v3\\ArrayOfDomainInfo");
	}
}