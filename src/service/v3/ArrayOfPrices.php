<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfPrices

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfPricesDb;
use ascio\api\v3\ArrayOfPricesApi;


class ArrayOfPrices extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Price"];
	protected $_apiObjects=["Price"];
	protected $Price;

	public function setPrice (?Iterable $Price = null) : self {
		$this->set("Price", $Price);
		return $this;
	}
	public function getPrice () : ?Iterable {
		return $this->get("Price", "\\ascio\\v3\\Price");
	}
	public function createPrice () : \ascio\v3\Price {
		return $this->create ("Price", "\\ascio\\v3\\Price");
	}
	public function addPrice () : \ascio\v3\Price {
		return $this->add("Price","\\ascio\\v3\\Price",func_get_args());
	}
}