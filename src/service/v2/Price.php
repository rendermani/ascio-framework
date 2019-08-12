<?php

// XSLT-WSDL-Client. Generated PHP class of Price

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\PriceDb;
use ascio\api\v2\PriceApi;


class Price extends Base  {

	protected $_apiProperties=["OrderType", "Period", "Price"];
	protected $_apiObjects=[];
	protected $OrderType;
	protected $Period;
	protected $Price;

	public function setOrderType (?string $OrderType = null) : \ascio\v2\Price {
		$this->set("OrderType", $OrderType);
		return $this;
	}
	public function getOrderType () : ?string {
		return $this->get("OrderType", "string");
	}
	public function setPeriod (?int $Period = null) : \ascio\v2\Price {
		$this->set("Period", $Period);
		return $this;
	}
	public function getPeriod () : ?int {
		return $this->get("Period", "int");
	}
	public function setPrice (?\decimal $Price = null) : \ascio\v2\Price {
		$this->set("Price", $Price);
		return $this;
	}
	public function getPrice () : ?\decimal {
		return $this->get("Price", "\\decimal");
	}
}