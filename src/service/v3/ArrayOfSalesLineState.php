<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSalesLineState

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfSalesLineStateDb;
use ascio\api\v3\ArrayOfSalesLineStateApi;
use ascio\base\v3\ArrayBase;


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
	public function addSalesLineState ($item = null) : string {
		return $this->addItem("SalesLineState","string",func_get_args());
	}
}