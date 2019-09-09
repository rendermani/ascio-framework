<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSearchZoneClause

namespace ascio\service\dns;
use ascio\base\dns\ArrayBase;
use ascio\db\dns\ArrayOfSearchZoneClauseDb;
use ascio\api\dns\ArrayOfSearchZoneClauseApi;


abstract class ArrayOfSearchZoneClause extends ArrayBase implements \Iterator, \ArrayAccess  {

	protected $_apiProperties=["SearchZoneClause"];
	protected $_apiObjects=["SearchZoneClause"];
	protected $SearchZoneClause;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\dns\SearchZoneClause {
		return parent::current();
	}
	public function first() : \ascio\dns\SearchZoneClause {
		return parent::first();
	}
	public function last() : \ascio\dns\SearchZoneClause {
		return parent::last();
	}
	public function index($nr) : \ascio\dns\SearchZoneClause {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchZoneClause (?Iterable $SearchZoneClause = null) : self {
		$this->set("SearchZoneClause", $SearchZoneClause);
		return $this;
	}
	public function getSearchZoneClause () : ?Iterable {
		return $this->get("SearchZoneClause", "\\ascio\\dns\\SearchZoneClause");
	}
	public function createSearchZoneClause () : \ascio\dns\SearchZoneClause {
		return $this->create ("SearchZoneClause", "\\ascio\\dns\\SearchZoneClause");
	}
	public function addSearchZoneClause () : \ascio\dns\SearchZoneClause {
		return $this->add("SearchZoneClause","\\ascio\\dns\\SearchZoneClause",func_get_args());
	}
}