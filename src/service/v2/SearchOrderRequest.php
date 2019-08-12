<?php

// XSLT-WSDL-Client. Generated PHP class of SearchOrderRequest

namespace ascio\service\v2;
use ascio\base\v2\Base;
use ascio\db\v2\SearchOrderRequestDb;
use ascio\api\v2\SearchOrderRequestApi;


class SearchOrderRequest extends Base  {

	protected $_apiProperties=["OrderTypes", "OrderStatusTypes", "FromDate", "ToDate", "DomainName", "TransactionComment", "Comments", "IncludeDomainDetails", "PageInfo", "OrderSort"];
	protected $_apiObjects=["OrderTypes", "OrderStatusTypes", "PageInfo"];
	protected $OrderTypes;
	protected $OrderStatusTypes;
	protected $FromDate;
	protected $ToDate;
	protected $DomainName;
	protected $TransactionComment;
	protected $Comments;
	protected $IncludeDomainDetails;
	protected $PageInfo;
	protected $OrderSort;

	public function setOrderTypes (?\ascio\v2\ArrayOfOrderType $OrderTypes = null) : \ascio\v2\SearchOrderRequest {
		$this->set("OrderTypes", $OrderTypes);
		return $this;
	}
	public function getOrderTypes () : ?\ascio\v2\ArrayOfOrderType {
		return $this->get("OrderTypes", "\\ascio\\v2\\ArrayOfOrderType");
	}
	public function createOrderTypes () : \ascio\v2\ArrayOfOrderType {
		return $this->create ("OrderTypes", "\\ascio\\v2\\ArrayOfOrderType");
	}
	public function setOrderStatusTypes (?\ascio\v2\ArrayOfOrderStatusType $OrderStatusTypes = null) : \ascio\v2\SearchOrderRequest {
		$this->set("OrderStatusTypes", $OrderStatusTypes);
		return $this;
	}
	public function getOrderStatusTypes () : ?\ascio\v2\ArrayOfOrderStatusType {
		return $this->get("OrderStatusTypes", "\\ascio\\v2\\ArrayOfOrderStatusType");
	}
	public function createOrderStatusTypes () : \ascio\v2\ArrayOfOrderStatusType {
		return $this->create ("OrderStatusTypes", "\\ascio\\v2\\ArrayOfOrderStatusType");
	}
	public function setFromDate (?\DateTime $FromDate = null) : \ascio\v2\SearchOrderRequest {
		$this->set("FromDate", $FromDate);
		return $this;
	}
	public function getFromDate () : ?\DateTime {
		return $this->get("FromDate", "\\DateTime");
	}
	public function setToDate (?\DateTime $ToDate = null) : \ascio\v2\SearchOrderRequest {
		$this->set("ToDate", $ToDate);
		return $this;
	}
	public function getToDate () : ?\DateTime {
		return $this->get("ToDate", "\\DateTime");
	}
	public function setDomainName (?string $DomainName = null) : \ascio\v2\SearchOrderRequest {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setTransactionComment (?string $TransactionComment = null) : \ascio\v2\SearchOrderRequest {
		$this->set("TransactionComment", $TransactionComment);
		return $this;
	}
	public function getTransactionComment () : ?string {
		return $this->get("TransactionComment", "string");
	}
	public function setComments (?string $Comments = null) : \ascio\v2\SearchOrderRequest {
		$this->set("Comments", $Comments);
		return $this;
	}
	public function getComments () : ?string {
		return $this->get("Comments", "string");
	}
	public function setIncludeDomainDetails (?bool $IncludeDomainDetails = null) : \ascio\v2\SearchOrderRequest {
		$this->set("IncludeDomainDetails", $IncludeDomainDetails);
		return $this;
	}
	public function getIncludeDomainDetails () : ?bool {
		return $this->get("IncludeDomainDetails", "bool");
	}
	public function setPageInfo (?\ascio\v2\PagingInfo $PageInfo = null) : \ascio\v2\SearchOrderRequest {
		$this->set("PageInfo", $PageInfo);
		return $this;
	}
	public function getPageInfo () : ?\ascio\v2\PagingInfo {
		return $this->get("PageInfo", "\\ascio\\v2\\PagingInfo");
	}
	public function createPageInfo () : \ascio\v2\PagingInfo {
		return $this->create ("PageInfo", "\\ascio\\v2\\PagingInfo");
	}
	public function setOrderSort (?string $OrderSort = null) : \ascio\v2\SearchOrderRequest {
		$this->set("OrderSort", $OrderSort);
		return $this;
	}
	public function getOrderSort () : ?string {
		return $this->get("OrderSort", "string");
	}
}