<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfPrices

namespace ascio\service\v2;
use ascio\base\v2\ArrayBase;
use ascio\db\v2\ArrayOfPricesDb;
use ascio\api\v2\ArrayOfPricesApi;


abstract class ArrayOfPrices extends ArrayBase implements \Iterator, \ArrayAccess  {

	protected $_apiProperties=["Price"];
	protected $_apiObjects=["Price"];
	protected $Price;

	/**
	* Array-Specific methods
	*/
	public function current() : \ascio\v2\Price {
		return parent::current();
	}
	public function first() : \ascio\v2\Price {
		return parent::first();
	}
	public function last() : \ascio\v2\Price {
		return parent::last();
	}
	public function index($nr) : \ascio\v2\Price {
		return parent::index($nr);
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setPrice (?Iterable $Price = null) : self {
		$this->set("Price", $Price);
		return $this;
	}
	public function getPrice () : ?Iterable {
		return $this->get("Price", "\\ascio\\v2\\Price");
	}
	public function createPrice () : \ascio\v2\Price {
		return $this->create ("Price", "\\ascio\\v2\\Price");
	}
	public function addPrice () : \ascio\v2\Price {
		return $this->add("Price","\\ascio\\v2\\Price",func_get_args());
	}
}