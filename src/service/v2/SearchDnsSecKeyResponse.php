<?php

// XSLT-WSDL-Client. Generated PHP class of SearchDnsSecKeyResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\SearchDnsSecKeyResponseDb;
use ascio\api\v2\SearchDnsSecKeyResponseApi;


abstract class SearchDnsSecKeyResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchDnsSecKeyResult", "dnsSecKeys"];
	protected $_apiObjects=["SearchDnsSecKeyResult", "dnsSecKeys"];
	protected $SearchDnsSecKeyResult;
	protected $dnsSecKeys;

	public function setSearchDnsSecKeyResult (?\ascio\v2\Response $SearchDnsSecKeyResult = null) : self {
		$this->set("SearchDnsSecKeyResult", $SearchDnsSecKeyResult);
		return $this;
	}
	public function getSearchDnsSecKeyResult () : ?\ascio\v2\Response {
		return $this->get("SearchDnsSecKeyResult", "\\ascio\\v2\\Response");
	}
	public function createSearchDnsSecKeyResult () : \ascio\v2\Response {
		return $this->create ("SearchDnsSecKeyResult", "\\ascio\\v2\\Response");
	}
	public function setDnsSecKeys (?\ascio\v2\ArrayOfDnsSecKey $dnsSecKeys = null) : self {
		$this->set("dnsSecKeys", $dnsSecKeys);
		return $this;
	}
	public function getDnsSecKeys () : ?\ascio\v2\ArrayOfDnsSecKey {
		return $this->get("dnsSecKeys", "\\ascio\\v2\\ArrayOfDnsSecKey");
	}
	public function createDnsSecKeys () : \ascio\v2\ArrayOfDnsSecKey {
		return $this->create ("dnsSecKeys", "\\ascio\\v2\\ArrayOfDnsSecKey");
	}
}