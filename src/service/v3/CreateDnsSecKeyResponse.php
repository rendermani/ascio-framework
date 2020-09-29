<?php

// XSLT-WSDL-Client. Generated PHP class of CreateDnsSecKeyResponse

namespace ascio\service\v3;
use ascio\db\v3\CreateDnsSecKeyResponseDb;
use ascio\api\v3\CreateDnsSecKeyResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class CreateDnsSecKeyResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "DnsSecKey"];
	protected $_apiObjects=["Errors", "DnsSecKey"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $DnsSecKey;

	public function setDnsSecKey (?\ascio\v3\DnsSecKey $DnsSecKey = null) : self {
		$this->set("DnsSecKey", $DnsSecKey);
		return $this;
	}
	public function getDnsSecKey () : ?\ascio\v3\DnsSecKey {
		return $this->get("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
	public function createDnsSecKey () : \ascio\v3\DnsSecKey {
		return $this->create ("DnsSecKey", "\\ascio\\v3\\DnsSecKey");
	}
}