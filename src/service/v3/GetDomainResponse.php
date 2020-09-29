<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomainResponse

namespace ascio\service\v3;
use ascio\db\v3\GetDomainResponseDb;
use ascio\api\v3\GetDomainResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetDomainResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "DomainInfo"];
	protected $_apiObjects=["Errors", "DomainInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $DomainInfo;

	public function setDomainInfo (?\ascio\v3\DomainInfo $DomainInfo = null) : self {
		$this->set("DomainInfo", $DomainInfo);
		return $this;
	}
	public function getDomainInfo () : ?\ascio\v3\DomainInfo {
		return $this->get("DomainInfo", "\\ascio\\v3\\DomainInfo");
	}
	public function createDomainInfo () : \ascio\v3\DomainInfo {
		return $this->create ("DomainInfo", "\\ascio\\v3\\DomainInfo");
	}
}