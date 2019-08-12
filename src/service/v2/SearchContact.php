<?php

// XSLT-WSDL-Client. Generated PHP class of SearchContact

namespace ascio\service\v2;
use ascio\base\v2\RequestRootElement;
use ascio\db\v2\SearchContactDb;
use ascio\api\v2\SearchContactApi;


class SearchContact extends RequestRootElement  {

	protected $_apiProperties=["sessionId", "criteria"];
	protected $_apiObjects=["criteria"];
	protected $sessionId;
	protected $criteria;

	public function setSessionId (?string $sessionId = null) : \ascio\v2\SearchContact {
		$this->set("sessionId", $sessionId);
		return $this;
	}
	public function getSessionId () : ?string {
		return $this->get("sessionId", "string");
	}
	public function setCriteria (?\ascio\v2\SearchCriteria $criteria = null) : \ascio\v2\SearchContact {
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