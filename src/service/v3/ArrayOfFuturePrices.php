<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfFuturePrices

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfFuturePricesDb;
use ascio\api\v3\ArrayOfFuturePricesApi;
use ascio\base\v3\ArrayBase;


class ArrayOfFuturePrices extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["FuturePriceInfo"];
	protected $_apiObjects=["FuturePriceInfo"];
	protected $FuturePriceInfo;

	public function setFuturePriceInfo (?Iterable $FuturePriceInfo = null) : self {
		$this->set("FuturePriceInfo", $FuturePriceInfo);
		return $this;
	}
	public function getFuturePriceInfo () : ?Iterable {
		return $this->get("FuturePriceInfo", "\\ascio\\v3\\FuturePriceInfo");
	}
	public function createFuturePriceInfo () : \ascio\v3\FuturePriceInfo {
		return $this->create ("FuturePriceInfo", "\\ascio\\v3\\FuturePriceInfo");
	}
	public function addFuturePriceInfo ($item = null) : \ascio\v3\FuturePriceInfo {
		return $this->addItem("FuturePriceInfo","\\ascio\\v3\\FuturePriceInfo",func_get_args());
	}
}