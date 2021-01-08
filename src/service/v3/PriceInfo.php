<?php

// XSLT-WSDL-Client. Generated PHP class of PriceInfo

namespace ascio\service\v3;
use ascio\db\v3\PriceInfoDb;
use ascio\api\v3\PriceInfoApi;
use ascio\base\v3\Base;


class PriceInfo extends Base  {

	protected $_apiProperties=["Product", "Price", "ValidFrom", "ValidTo"];
	protected $_apiObjects=["Product"];
	protected $Product;
	protected $Price;
	protected $ValidFrom;
	protected $ValidTo;

	public function setProduct (?\ascio\v3\Product $Product = null) : self {
		$this->set("Product", $Product);
		return $this;
	}
	public function getProduct () : ?\ascio\v3\Product {
		return $this->get("Product", "\\ascio\\v3\\Product");
	}
	public function createProduct () : \ascio\v3\Product {
		return $this->create ("Product", "\\ascio\\v3\\Product");
	}
	public function setPrice (?\decimal $Price = null) : self {
		$this->set("Price", $Price);
		return $this;
	}
	public function getPrice () : ?\decimal {
		return $this->get("Price", "\\decimal");
	}
	public function setValidFrom (?\DateTime $ValidFrom = null) : self {
		$this->set("ValidFrom", $ValidFrom);
		return $this;
	}
	public function getValidFrom () : ?\DateTime {
		return $this->get("ValidFrom", "\\DateTime");
	}
	public function setValidTo (?\DateTime $ValidTo = null) : self {
		$this->set("ValidTo", $ValidTo);
		return $this;
	}
	public function getValidTo () : ?\DateTime {
		return $this->get("ValidTo", "\\DateTime");
	}
}