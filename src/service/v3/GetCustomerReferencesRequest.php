<?php

// XSLT-WSDL-Client. Generated PHP class of GetCustomerReferencesRequest

namespace ascio\service\v3;
use ascio\db\v3\GetCustomerReferencesRequestDb;
use ascio\api\v3\GetCustomerReferencesRequestApi;
use ascio\base\v3\Base;


class GetCustomerReferencesRequest extends Base  {

	protected $_apiProperties=["Handle", "ExternalId", "Description", "Status", "CreationFromDate", "CreationToDate", "OrderSort", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $Handle;
	protected $ExternalId;
	protected $Description;
	protected $Status;
	protected $CreationFromDate;
	protected $CreationToDate;
	protected $OrderSort;
	protected $PageInfo;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setExternalId (?string $ExternalId = null) : self {
		$this->set("ExternalId", $ExternalId);
		return $this;
	}
	public function getExternalId () : ?string {
		return $this->get("ExternalId", "string");
	}
	public function setDescription (?string $Description = null) : self {
		$this->set("Description", $Description);
		return $this;
	}
	public function getDescription () : ?string {
		return $this->get("Description", "string");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreationFromDate (?\DateTime $CreationFromDate = null) : self {
		$this->set("CreationFromDate", $CreationFromDate);
		return $this;
	}
	public function getCreationFromDate () : ?\DateTime {
		return $this->get("CreationFromDate", "\\DateTime");
	}
	public function setCreationToDate (?\DateTime $CreationToDate = null) : self {
		$this->set("CreationToDate", $CreationToDate);
		return $this;
	}
	public function getCreationToDate () : ?\DateTime {
		return $this->get("CreationToDate", "\\DateTime");
	}
	public function setOrderSort (?string $OrderSort = null) : self {
		$this->set("OrderSort", $OrderSort);
		return $this;
	}
	public function getOrderSort () : ?string {
		return $this->get("OrderSort", "string");
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