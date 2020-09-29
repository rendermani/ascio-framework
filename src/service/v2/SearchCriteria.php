<?php

// XSLT-WSDL-Client. Generated PHP class of SearchCriteria

namespace ascio\service\v2;
use ascio\db\v2\SearchCriteriaDb;
use ascio\api\v2\SearchCriteriaApi;
use ascio\base\v2\Base;


class SearchCriteria extends Base  {

	protected $_apiProperties=["Clauses", "Mode", "Withoutstates", "Withstates"];
	protected $_apiObjects=["Clauses", "Withoutstates", "Withstates"];
	protected $Clauses;
	protected $Mode;
	protected $Withoutstates;
	protected $Withstates;

	public function setClauses (?\ascio\v2\ArrayOfClause $Clauses = null) : self {
		$this->set("Clauses", $Clauses);
		return $this;
	}
	public function getClauses () : ?\ascio\v2\ArrayOfClause {
		return $this->get("Clauses", "\\ascio\\v2\\ArrayOfClause");
	}
	public function createClauses () : \ascio\v2\ArrayOfClause {
		return $this->create ("Clauses", "\\ascio\\v2\\ArrayOfClause");
	}
	public function setMode (?string $Mode = null) : self {
		$this->set("Mode", $Mode);
		return $this;
	}
	public function getMode () : ?string {
		return $this->get("Mode", "string");
	}
	public function setWithoutstates (?\ascio\v2\ArrayOfstring $Withoutstates = null) : self {
		$this->set("Withoutstates", $Withoutstates);
		return $this;
	}
	public function getWithoutstates () : ?\ascio\v2\ArrayOfstring {
		return $this->get("Withoutstates", "\\ascio\\v2\\ArrayOfstring");
	}
	public function createWithoutstates () : \ascio\v2\ArrayOfstring {
		return $this->create ("Withoutstates", "\\ascio\\v2\\ArrayOfstring");
	}
	public function setWithstates (?\ascio\v2\ArrayOfstring $Withstates = null) : self {
		$this->set("Withstates", $Withstates);
		return $this;
	}
	public function getWithstates () : ?\ascio\v2\ArrayOfstring {
		return $this->get("Withstates", "\\ascio\\v2\\ArrayOfstring");
	}
	public function createWithstates () : \ascio\v2\ArrayOfstring {
		return $this->create ("Withstates", "\\ascio\\v2\\ArrayOfstring");
	}
}