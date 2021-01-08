<?php

// XSLT-WSDL-Client. Generated PHP class of GetPremiumDomainsRequest

namespace ascio\service\v3;
use ascio\db\v3\GetPremiumDomainsRequestDb;
use ascio\api\v3\GetPremiumDomainsRequestApi;
use ascio\base\v3\Base;


class GetPremiumDomainsRequest extends Base  {

	protected $_apiProperties=["ObjectName", "Handle", "Tld", "Status", "CreationFromDate", "CreationToDate", "ExpireFromDate", "ExpireToDate", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $ObjectName;
	protected $Handle;
	protected $Tld;
	protected $Status;
	protected $CreationFromDate;
	protected $CreationToDate;
	protected $ExpireFromDate;
	protected $ExpireToDate;
	protected $PageInfo;

	public function setObjectName (?string $ObjectName = null) : self {
		$this->set("ObjectName", $ObjectName);
		return $this;
	}
	public function getObjectName () : ?string {
		return $this->get("ObjectName", "string");
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setTld (?string $Tld = null) : self {
		$this->set("Tld", $Tld);
		return $this;
	}
	public function getTld () : ?string {
		return $this->get("Tld", "string");
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
	public function setExpireFromDate (?\DateTime $ExpireFromDate = null) : self {
		$this->set("ExpireFromDate", $ExpireFromDate);
		return $this;
	}
	public function getExpireFromDate () : ?\DateTime {
		return $this->get("ExpireFromDate", "\\DateTime");
	}
	public function setExpireToDate (?\DateTime $ExpireToDate = null) : self {
		$this->set("ExpireToDate", $ExpireToDate);
		return $this;
	}
	public function getExpireToDate () : ?\DateTime {
		return $this->get("ExpireToDate", "\\DateTime");
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