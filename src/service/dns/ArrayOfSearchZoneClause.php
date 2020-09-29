<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSearchZoneClause

namespace ascio\service\dns;
use ascio\db\dns\ArrayOfSearchZoneClauseDb;
use ascio\api\dns\ArrayOfSearchZoneClauseApi;
use ascio\base\dns\ArrayBase;


class ArrayOfSearchZoneClause extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SearchZoneClause"];
	protected $_apiObjects=["SearchZoneClause"];
	protected $SearchZoneClause;

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
	public function addSearchZoneClause ($item = null) : \ascio\dns\SearchZoneClause {
		return $this->addItem("SearchZoneClause","\\ascio\\dns\\SearchZoneClause",func_get_args());
	}
}