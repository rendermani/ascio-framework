<?php

// XSLT-WSDL-Client. Generated PHP class of SearchNameServer

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\SearchNameServerDb;
use ascio\api\v2\SearchNameServerApi;


class SearchNameServer extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "criteria"];
	protected $_apiObjects=["criteria"];
	protected $sessionId;
	protected $criteria;

	public function setSessionId (?string $sessionId = null) : self {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setCriteria (?\ascio\v2\SearchCriteria $criteria = null) : self {
		$this->set("criteria", $criteria);
		return $this;
	}
	public function getCriteria () : ?\ascio\v2\SearchCriteria {
		return $this->get("criteria", "\\ascio\\v2\\SearchCriteria");
	}
	public function createCriteria () : \ascio\v2\SearchCriteria {
		return $this->create ("criteria", "\\ascio\\v2\\SearchCriteria");
	}
}