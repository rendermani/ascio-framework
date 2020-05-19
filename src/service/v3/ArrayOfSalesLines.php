<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfSalesLines

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfSalesLinesDb;
use ascio\api\v3\ArrayOfSalesLinesApi;


class ArrayOfSalesLines extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["SalesLine"];
	protected $_apiObjects=["SalesLine"];
	protected $SalesLine;

	public function setSalesLine (?Iterable $SalesLine = null) : self {
		$this->set("SalesLine", $SalesLine);
		return $this;
	}
	public function getSalesLine () : ?Iterable {
		return $this->get("SalesLine", "\\ascio\\v3\\SalesLine");
	}
	public function createSalesLine () : \ascio\v3\SalesLine {
		return $this->create ("SalesLine", "\\ascio\\v3\\SalesLine");
	}
	public function addSalesLine () : \ascio\v3\SalesLine {
		return $this->add("SalesLine","\\ascio\\v3\\SalesLine",func_get_args());
	}
}