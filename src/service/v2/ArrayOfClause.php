<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfClause

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfClauseDb;
use ascio\api\v2\ArrayOfClauseApi;
use ascio\base\v2\ArrayBase;


class ArrayOfClause extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Clause"];
	protected $_apiObjects=["Clause"];
	protected $Clause;

	public function setClause (?Iterable $Clause = null) : self {
		$this->set("Clause", $Clause);
		return $this;
	}
	public function getClause () : ?Iterable {
		return $this->get("Clause", "\\ascio\\v2\\Clause");
	}
	public function createClause () : \ascio\v2\Clause {
		return $this->create ("Clause", "\\ascio\\v2\\Clause");
	}
	public function addClause ($item = null) : \ascio\v2\Clause {
		return $this->addItem("Clause","\\ascio\\v2\\Clause",func_get_args());
	}
}