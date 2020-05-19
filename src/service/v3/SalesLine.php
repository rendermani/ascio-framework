<?php

// XSLT-WSDL-Client. Generated PHP class of SalesLine

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\SalesLineDb;
use ascio\api\v3\SalesLineApi;


class SalesLine extends Base  {

	protected $_apiProperties=["OrderId", "Product", "ObjectHandle", "ObjectName", "Price", "PriceCategory", "CurrencyCode", "Created", "State", "InvoiceNo", "CreditNo", "DomainComment"];
	protected $_apiObjects=["Product", "Price"];
	protected $OrderId;
	protected $Product;
	protected $ObjectHandle;
	protected $ObjectName;
	protected $Price;
	protected $PriceCategory;
	protected $CurrencyCode;
	protected $Created;
	protected $State;
	protected $InvoiceNo;
	protected $CreditNo;
	protected $DomainComment;

	public function setOrderId (?int $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?int {
		return $this->get("OrderId", "int");
	}
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
	public function setObjectHandle (?string $ObjectHandle = null) : self {
		$this->set("ObjectHandle", $ObjectHandle);
		return $this;
	}
	public function getObjectHandle () : ?string {
		return $this->get("ObjectHandle", "string");
	}
	public function setObjectName (?string $ObjectName = null) : self {
		$this->set("ObjectName", $ObjectName);
		return $this;
	}
	public function getObjectName () : ?string {
		return $this->get("ObjectName", "string");
	}
	public function setPrice (?\ascio\v3\double $Price = null) : self {
		$this->set("Price", $Price);
		return $this;
	}
	public function getPrice () : ?\ascio\v3\double {
		return $this->get("Price", "\\ascio\\v3\\double");
	}
	public function createPrice () : \ascio\v3\double {
		return $this->create ("Price", "\\ascio\\v3\\double");
	}
	public function setPriceCategory (?string $PriceCategory = null) : self {
		$this->set("PriceCategory", $PriceCategory);
		return $this;
	}
	public function getPriceCategory () : ?string {
		return $this->get("PriceCategory", "string");
	}
	public function setCurrencyCode (?string $CurrencyCode = null) : self {
		$this->set("CurrencyCode", $CurrencyCode);
		return $this;
	}
	public function getCurrencyCode () : ?string {
		return $this->get("CurrencyCode", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setState (?string $State = null) : self {
		$this->set("State", $State);
		return $this;
	}
	public function getState () : ?string {
		return $this->get("State", "string");
	}
	public function setInvoiceNo (?int $InvoiceNo = null) : self {
		$this->set("InvoiceNo", $InvoiceNo);
		return $this;
	}
	public function getInvoiceNo () : ?int {
		return $this->get("InvoiceNo", "int");
	}
	public function setCreditNo (?int $CreditNo = null) : self {
		$this->set("CreditNo", $CreditNo);
		return $this;
	}
	public function getCreditNo () : ?int {
		return $this->get("CreditNo", "int");
	}
	public function setDomainComment (?string $DomainComment = null) : self {
		$this->set("DomainComment", $DomainComment);
		return $this;
	}
	public function getDomainComment () : ?string {
		return $this->get("DomainComment", "string");
	}
}