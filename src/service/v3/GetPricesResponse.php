<?php

// XSLT-WSDL-Client. Generated PHP class of GetPricesResponse

namespace ascio\service\v3;
use ascio\db\v3\GetPricesResponseDb;
use ascio\api\v3\GetPricesResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetPricesResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "Currency", "Prices"];
	protected $_apiObjects=["Errors", "Prices"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $Currency;
	protected $Prices;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
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