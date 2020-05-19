<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameServersRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\GetNameServersRequestDb;
use ascio\api\v3\GetNameServersRequestApi;


class GetNameServersRequest extends Base  {

	protected $_apiProperties=["Handle", "HostName", "IpAddress", "IpV6Address", "Status", "CreationFromDate", "CreationToDate", "OrderSort", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $Handle;
	protected $HostName;
	protected $IpAddress;
	protected $IpV6Address;
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
	public function setHostName (?string $HostName = null) : self {
		$this->set("HostName", $HostName);
		return $this;
	}
	public function getHostName () : ?string {
		return $this->get("HostName", "string");
	}
	public function setIpAddress (?string $IpAddress = null) : self {
		$this->set("IpAddress", $IpAddress);
		return $this;
	}
	public function getIpAddress () : ?string {
		return $this->get("IpAddress", "string");
	}
	public function setIpV6Address (?string $IpV6Address = null) : self {
		$this->set("IpV6Address", $IpV6Address);
		return $this;
	}
	public function getIpV6Address () : ?string {
		return $this->get("IpV6Address", "string");
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