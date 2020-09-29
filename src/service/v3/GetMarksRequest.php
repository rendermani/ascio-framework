<?php

// XSLT-WSDL-Client. Generated PHP class of GetMarksRequest

namespace ascio\service\v3;
use ascio\db\v3\GetMarksRequestDb;
use ascio\api\v3\GetMarksRequestApi;
use ascio\base\v3\Base;


class GetMarksRequest extends Base  {

	protected $_apiProperties=["ObjectNames", "Handles", "Status", "MarkType", "ObjectComment", "CreationFromDate", "CreationToDate", "ExpireFromDate", "ExpireToDate", "OwnerName", "OwnerOrganizationName", "OwnerEmail", "OrderSort", "PageInfo"];
	protected $_apiObjects=["ObjectNames", "Handles", "PageInfo"];
	protected $ObjectNames;
	protected $Handles;
	protected $Status;
	protected $MarkType;
	protected $ObjectComment;
	protected $CreationFromDate;
	protected $CreationToDate;
	protected $ExpireFromDate;
	protected $ExpireToDate;
	protected $OwnerName;
	protected $OwnerOrganizationName;
	protected $OwnerEmail;
	protected $OrderSort;
	protected $PageInfo;

	public function setObjectNames (?\ascio\v3\ArrayOfstring $ObjectNames = null) : self {
		$this->set("ObjectNames", $ObjectNames);
		return $this;
	}
	public function getObjectNames () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createObjectNames () : \ascio\v3\ArrayOfstring {
		return $this->create ("ObjectNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setHandles (?\ascio\v3\ArrayOfstring $Handles = null) : self {
		$this->set("Handles", $Handles);
		return $this;
	}
	public function getHandles () : ?\ascio\v3\ArrayOfstring {
		return $this->get("Handles", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createHandles () : \ascio\v3\ArrayOfstring {
		return $this->create ("Handles", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setMarkType (?string $MarkType = null) : self {
		$this->set("MarkType", $MarkType);
		return $this;
	}
	public function getMarkType () : ?string {
		return $this->get("MarkType", "string");
	}
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
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
	public function setOwnerName (?string $OwnerName = null) : self {
		$this->set("OwnerName", $OwnerName);
		return $this;
	}
	public function getOwnerName () : ?string {
		return $this->get("OwnerName", "string");
	}
	public function setOwnerOrganizationName (?string $OwnerOrganizationName = null) : self {
		$this->set("OwnerOrganizationName", $OwnerOrganizationName);
		return $this;
	}
	public function getOwnerOrganizationName () : ?string {
		return $this->get("OwnerOrganizationName", "string");
	}
	public function setOwnerEmail (?string $OwnerEmail = null) : self {
		$this->set("OwnerEmail", $OwnerEmail);
		return $this;
	}
	public function getOwnerEmail () : ?string {
		return $this->get("OwnerEmail", "string");
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