<?php

// XSLT-WSDL-Client. Generated PHP class of GetSalesLinesRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetSalesLinesRequestDb;
use ascio\api\v3\GetSalesLinesRequestApi;


class GetSalesLinesRequest extends Base  {

	protected $_apiProperties=["ObjectName", "ObjectHandle", "ObjectType", "ProductName", "FromDate", "ToDate", "SalesLineStates", "InvoiceState", "InvoiceNo", "CreditNo", "OrderBy", "PageInfo"];
	protected $_apiObjects=["SalesLineStates", "PageInfo"];
	protected $ObjectName;
	protected $ObjectHandle;
	protected $ObjectType;
	protected $ProductName;
	protected $FromDate;
	protected $ToDate;
	protected $SalesLineStates;
	protected $InvoiceState;
	protected $InvoiceNo;
	protected $CreditNo;
	protected $OrderBy;
	protected $PageInfo;

	public function setObjectName (?string $ObjectName = null) : self {
		$this->set("ObjectName", $ObjectName);
		return $this;
	}
	public function getObjectName () : ?string {
		return $this->get("ObjectName", "string");
	}
	public function setObjectHandle (?string $ObjectHandle = null) : self {
		$this->set("ObjectHandle", $ObjectHandle);
		return $this;
	}
	public function getObjectHandle () : ?string {
		return $this->get("ObjectHandle", "string");
	}
	public function setObjectType (?string $ObjectType = null) : self {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?string {
		return $this->get("ObjectType", "string");
	}
	public function setProductName (?string $ProductName = null) : self {
		$this->set("ProductName", $ProductName);
		return $this;
	}
	public function getProductName () : ?string {
		return $this->get("ProductName", "string");
	}
	public function setFromDate (?\DateTime $FromDate = null) : self {
		$this->set("FromDate", $FromDate);
		return $this;
	}
	public function getFromDate () : ?\DateTime {
		return $this->get("FromDate", "\\DateTime");
	}
	public function setToDate (?\DateTime $ToDate = null) : self {
		$this->set("ToDate", $ToDate);
		return $this;
	}
	public function getToDate () : ?\DateTime {
		return $this->get("ToDate", "\\DateTime");
	}
	public function setSalesLineStates (?\ascio\v3\ArrayOfSalesLineState $SalesLineStates = null) : self {
		$this->set("SalesLineStates", $SalesLineStates);
		return $this;
	}
	public function getSalesLineStates () : ?\ascio\v3\ArrayOfSalesLineState {
		return $this->get("SalesLineStates", "\\ascio\\v3\\ArrayOfSalesLineState");
	}
	public function createSalesLineStates () : \ascio\v3\ArrayOfSalesLineState {
		return $this->create ("SalesLineStates", "\\ascio\\v3\\ArrayOfSalesLineState");
	}
	public function setInvoiceState (?string $InvoiceState = null) : self {
		$this->set("InvoiceState", $InvoiceState);
		return $this;
	}
	public function getInvoiceState () : ?string {
		return $this->get("InvoiceState", "string");
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
	public function setOrderBy (?string $OrderBy = null) : self {
		$this->set("OrderBy", $OrderBy);
		return $this;
	}
	public function getOrderBy () : ?string {
		return $this->get("OrderBy", "string");
	}
	public function setPageInfo (?\ascio\v3\PagingInfo $PageInfo = null) : self {
		$this->set("PageInfo", $PageInfo);
		return $this;
	}
	public function getPageInfo () : ?\ascio\v3\PagingInfo {
		return $this->get("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
	public function createPageInfo () : \ascio\v3\PagingInfo {
		return $this->create ("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
}