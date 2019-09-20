<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfClause

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfClauseDb;
use ascio\api\v2\ArrayOfClauseApi;
use ascio\base\ArrayInterface;


abstract class ArrayOfClause extends ArrayBase implements ArrayInterface,\Iterator,\countable,\ArrayAccess  {

	protected $_apiProperties=["Clause"];
	protected $_apiObjects=["Clause"];
	protected $Clause;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\Clause {
		return parent::current();
	}
	public function first() : \ascio\v2\Clause {
		return parent::first();
	}
	public function last() : \ascio\v2\Clause {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Clause {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
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
	public function addClause () : \ascio\v2\Clause {
		return $this->addItem(func_get_args(),"\\ascio\\v2\\Clause");
	}
	public function addClauses ($array) : self {
		return $this->add(func_get_args());
	}
}