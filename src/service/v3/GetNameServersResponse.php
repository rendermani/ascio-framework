<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameServersResponse

namespace ascio\service\v3;
use ascio\db\v3\GetNameServersResponseDb;
use ascio\api\v3\GetNameServersResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetNameServersResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "NameServers"];
	protected $_apiObjects=["Errors", "NameServers"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $NameServers;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setNameServers (?\ascio\v3\ArrayOfNameServers $NameServers = null) : self {
		$this->set("NameServers", $NameServers);
		return $this;
	}
	public function getNameServers () : ?\ascio\v3\ArrayOfNameServers {
		return $this->get("NameServers", "\\ascio\\v3\\ArrayOfNameServers");
	}
	public function createNameServers () : \ascio\v3\ArrayOfNameServers {
		return $this->create ("NameServers", "\\ascio\\v3\\ArrayOfNameServers");
	}
}