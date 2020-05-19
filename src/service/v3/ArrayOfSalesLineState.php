<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSalesLineState

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfSalesLineStateDb;
use ascio\api\v3\ArrayOfSalesLineStateApi;


class ArrayOfSalesLineState extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SalesLineState"];
	protected $_apiObjects=[];
	protected $SalesLineState;

	public function setSalesLineState (?Iterable $SalesLineState = null) : self {
		$this->set("SalesLineState", $SalesLineState);
		return $this;
	}
	public function getSalesLineState () : ?Iterable {
		return $this->get("SalesLineState", "string");
	}
	public function addSalesLineState () : string {
		return $this->add("SalesLineState","string",func_get_args());
	}
}