<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfPrices

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfPricesDb;
use ascio\api\v3\ArrayOfPricesApi;
use ascio\base\v3\ArrayBase;


class ArrayOfPrices extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["PriceInfo"];
	protected $_apiObjects=["PriceInfo"];
	protected $PriceInfo;

	public function setPriceInfo (?Iterable $PriceInfo = null) : self {
		$this->set("PriceInfo", $PriceInfo);
		return $this;
	}
	public function getPriceInfo () : ?Iterable {
		return $this->get("PriceInfo", "\\ascio\\v3\\PriceInfo");
	}
	public function createPriceInfo () : \ascio\v3\PriceInfo {
		return $this->create ("PriceInfo", "\\ascio\\v3\\PriceInfo");
	}
	public function addPriceInfo ($item = null) : \ascio\v3\PriceInfo {
		return $this->addItem("PriceInfo","\\ascio\\v3\\PriceInfo",func_get_args());
	}
}