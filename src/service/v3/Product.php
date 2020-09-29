<?php

// XSLT-WSDL-Client. Generated PHP class of Product

namespace ascio\service\v3;
use ascio\db\v3\ProductDb;
use ascio\api\v3\ProductApi;
use ascio\base\v3\Base;


class Product extends Base  {

	protected $_apiProperties=["ProductName", "ObjectType", "OrderType", "Tld", "TldCountry", "Period", "Note"];
	protected $_apiObjects=[];
	protected $ProductName;
	protected $ObjectType;
	protected $OrderType;
	protected $Tld;
	protected $TldCountry;
	protected $Period;
	protected $Note;

	public function setProductName (?string $ProductName = null) : self {
		$this->set("ProductName", $ProductName);
		return $this;
	}
	public function getProductName () : ?string {
		return $this->get("ProductName", "string");
	}
	public function setObjectType (?string $ObjectType = null) : self {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?string {
		return $this->get("ObjectType", "string");
	}
	public function setOrderType (?string $OrderType = null) : self {
		$this->set("OrderType", $OrderType);
		return $this;
	}
	public function getOrderType () : ?string {
		return $this->get("OrderType", "string");
	}
	public function setTld (?string $Tld = null) : self {
		$this->set("Tld", $Tld);
		return $this;
	}
	public function getTld () : ?string {
		return $this->get("Tld", "string");
	}
	public function setTldCountry (?string $TldCountry = null) : self {
		$this->set("TldCountry", $TldCountry);
		return $this;
	}
	public function getTldCountry () : ?string {
		return $this->get("TldCountry", "string");
	}
	public function setPeriod (?int $Period = null) : self {
		$this->set("Period", $Period);
		return $this;
	}
	public function getPeriod () : ?int {
		return $this->get("Period", "int");
	}
	public function setNote (?string $Note = null) : self {
		$this->set("Note", $Note);
		return $this;
	}
	public function getNote () : ?string {
		return $this->get("Note", "string");
	}
}