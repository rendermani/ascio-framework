<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeysResponse

namespace ascio\service\v3;
use ascio\db\v3\GetDnsSecKeysResponseDb;
use ascio\api\v3\GetDnsSecKeysResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetDnsSecKeysResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "DnsSecKeys"];
	protected $_apiObjects=["Errors", "DnsSecKeys"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $DnsSecKeys;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setDnsSecKeys (?\ascio\v3\ArrayOfDnsSecKeys $DnsSecKeys = null) : self {
		$this->set("DnsSecKeys", $DnsSecKeys);
		return $this;
	}
	public function getDnsSecKeys () : ?\ascio\v3\ArrayOfDnsSecKeys {
		return $this->get("DnsSecKeys", "\\ascio\\v3\\ArrayOfDnsSecKeys");
	}
	public function createDnsSecKeys () : \ascio\v3\ArrayOfDnsSecKeys {
		return $this->create ("DnsSecKeys", "\\ascio\\v3\\ArrayOfDnsSecKeys");
	}
}