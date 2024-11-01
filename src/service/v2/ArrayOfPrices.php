<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfPrices

namespace ascio\service\v2;
use ascio\db\v2\ArrayOfPricesDb;
use ascio\api\v2\ArrayOfPricesApi;
use ascio\base\v2\ArrayBase;


class ArrayOfPrices extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["Price"];
	protected $_apiObjects=["Price"];
	protected $Price;

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
	public function addPrice ($item = null) : \ascio\v2\Price {
		return $this->addItem("Price","\\ascio\\v2\\Price",func_get_args());
	}
}