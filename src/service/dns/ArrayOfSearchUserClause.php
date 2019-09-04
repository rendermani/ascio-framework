<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSearchUserClause

namespace ascio\service\dns;
use ascio\base\dns\ArrayBase;
use ascio\db\dns\ArrayOfSearchUserClauseDb;
use ascio\api\dns\ArrayOfSearchUserClauseApi;


abstract class ArrayOfSearchUserClause extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SearchUserClause"];
	protected $_apiObjects=["SearchUserClause"];
	protected $SearchUserClause;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\dns\SearchUserClause {
		return parent::current();
	}
	public function first() : \ascio\dns\SearchUserClause {
		return parent::first();
	}
	public function last() : \ascio\dns\SearchUserClause {
		return parent::last();
	}
	public function index($nr) : \ascio\dns\SearchUserClause {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setSearchUserClause (?Iterable $SearchUserClause = null) : self {
		$this->set("SearchUserClause", $SearchUserClause);
		return $this;
	}
	public function getSearchUserClause () : ?Iterable {
		return $this->get("SearchUserClause", "\\ascio\\dns\\SearchUserClause");
	}
	public function createSearchUserClause () : \ascio\dns\SearchUserClause {
		return $this->create ("SearchUserClause", "\\ascio\\dns\\SearchUserClause");
	}
	public function addSearchUserClause () : \ascio\dns\SearchUserClause {
		return $this->add("SearchUserClause","\\ascio\\dns\\SearchUserClause",func_get_args());
	}
}