<?php

// XSLT-WSDL-Client. Generated PHP class of GetPriceHistoryResponse

namespace ascio\service\v3;
use ascio\base\v3\ResponseRootElement;
use ascio\db\v3\GetPriceHistoryResponseDb;
use ascio\api\v3\GetPriceHistoryResponseApi;


class GetPriceHistoryResponse extends ResponseRootElement  {

	protected $_apiProperties=["Currency", "Prices"];
	protected $_apiObjects=["Prices"];
	protected $Currency;
	protected $Prices;

	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
	}
	public function setPrices (?\ascio\v3\ArrayOfPrices $Prices = null) : self {
		$this->set("Prices", $Prices);
		return $this;
	}
	public function getPrices () : ?\ascio\v3\ArrayOfPrices {
		return $this->get("Prices", "\\ascio\\v3\\ArrayOfPrices");
	}
	public function createPrices () : \ascio\v3\ArrayOfPrices {
		return $this->create ("Prices", "\\ascio\\v3\\ArrayOfPrices");
	}
}