<?php

// XSLT-WSDL-Client. Generated PHP class of GetDomainsRequest

namespace ascio\service\v3;
use ascio\db\v3\GetDomainsRequestDb;
use ascio\api\v3\GetDomainsRequestApi;
use ascio\base\v3\Base;


class GetDomainsRequest extends Base  {

	protected $_apiProperties=["ObjectNames", "Handles", "Tlds", "Status", "DomainType", "ProxyType", "DomainComment", "CreationFromDate", "CreationToDate", "ExpireFromDate", "ExpireToDate", "OwnerName", "OwnerOrganizationName", "OwnerEmail", "ContactFirstName", "ContactLastName", "ContactOrganizationName", "ContactEmail", "NameServerHostName", "NameServerIPv4", "NameServerIPv6", "CustomerReferenceExternalId", "CustomerReferenceDescription", "OrderSort", "PageInfo", "LocalPresence"];
	protected $_apiObjects=["ObjectNames", "Handles", "Tlds", "PageInfo"];
	protected $ObjectNames;
	protected $Handles;
	protected $Tlds;
	protected $Status;
	protected $DomainType;
	protected $ProxyType;
	protected $DomainComment;
	protected $CreationFromDate;
	protected $CreationToDate;
	protected $ExpireFromDate;
	protected $ExpireToDate;
	protected $OwnerName;
	protected $OwnerOrganizationName;
	protected $OwnerEmail;
	protected $ContactFirstName;
	protected $ContactLastName;
	protected $ContactOrganizationName;
	protected $ContactEmail;
	protected $NameServerHostName;
	protected $NameServerIPv4;
	protected $NameServerIPv6;
	protected $CustomerReferenceExternalId;
	protected $CustomerReferenceDescription;
	protected $OrderSort;
	protected $PageInfo;
	protected $LocalPresence;

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
	public function setTlds (?\ascio\v3\ArrayOfstring $Tlds = null) : self {
		$this->set("Tlds", $Tlds);
		return $this;
	}
	public function getTlds () : ?\ascio\v3\ArrayOfstring {
		return $this->get("Tlds", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createTlds () : \ascio\v3\ArrayOfstring {
		return $this->create ("Tlds", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setDomainType (?string $DomainType = null) : self {
		$this->set("DomainType", $DomainType);
		return $this;
	}
	public function getDomainType () : ?string {
		return $this->get("DomainType", "string");
	}
	public function setProxyType (?string $ProxyType = null) : self {
		$this->set("ProxyType", $ProxyType);
		return $this;
	}
	public function getProxyType () : ?string {
		return $this->get("ProxyType", "string");
	}
	public function setDomainComment (?string $DomainComment = null) : self {
		$this->set("DomainComment", $DomainComment);
		return $this;
	}
	public function getDomainComment () : ?string {
		return $this->get("DomainComment", "string");
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
	public function setContactFirstName (?string $ContactFirstName = null) : self {
		$this->set("ContactFirstName", $ContactFirstName);
		return $this;
	}
	public function getContactFirstName () : ?string {
		return $this->get("ContactFirstName", "string");
	}
	public function setContactLastName (?string $ContactLastName = null) : self {
		$this->set("ContactLastName", $ContactLastName);
		return $this;
	}
	public function getContactLastName () : ?string {
		return $this->get("ContactLastName", "string");
	}
	public function setContactOrganizationName (?string $ContactOrganizationName = null) : self {
		$this->set("ContactOrganizationName", $ContactOrganizationName);
		return $this;
	}
	public function getContactOrganizationName () : ?string {
		return $this->get("ContactOrganizationName", "string");
	}
	public function setContactEmail (?string $ContactEmail = null) : self {
		$this->set("ContactEmail", $ContactEmail);
		return $this;
	}
	public function getContactEmail () : ?string {
		return $this->get("ContactEmail", "string");
	}
	public function setNameServerHostName (?string $NameServerHostName = null) : self {
		$this->set("NameServerHostName", $NameServerHostName);
		return $this;
	}
	public function getNameServerHostName () : ?string {
		return $this->get("NameServerHostName", "string");
	}
	public function setNameServerIPv4 (?string $NameServerIPv4 = null) : self {
		$this->set("NameServerIPv4", $NameServerIPv4);
		return $this;
	}
	public function getNameServerIPv4 () : ?string {
		return $this->get("NameServerIPv4", "string");
	}
	public function setNameServerIPv6 (?string $NameServerIPv6 = null) : self {
		$this->set("NameServerIPv6", $NameServerIPv6);
		return $this;
	}
	public function getNameServerIPv6 () : ?string {
		return $this->get("NameServerIPv6", "string");
	}
	public function setCustomerReferenceExternalId (?string $CustomerReferenceExternalId = null) : self {
		$this->set("CustomerReferenceExternalId", $CustomerReferenceExternalId);
		return $this;
	}
	public function getCustomerReferenceExternalId () : ?string {
		return $this->get("CustomerReferenceExternalId", "string");
	}
	public function setCustomerReferenceDescription (?string $CustomerReferenceDescription = null) : self {
		$this->set("CustomerReferenceDescription", $CustomerReferenceDescription);
		return $this;
	}
	public function getCustomerReferenceDescription () : ?string {
		return $this->get("CustomerReferenceDescription", "string");
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
	public function setLocalPresence (?bool $LocalPresence = null) : self {
		$this->set("LocalPresence", $LocalPresence);
		return $this;
	}
	public function getLocalPresence () : ?bool {
		return $this->get("LocalPresence", "bool");
	}
}