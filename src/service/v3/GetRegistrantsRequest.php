<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantsRequest

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantsRequestDb;
use ascio\api\v3\GetRegistrantsRequestApi;
use ascio\base\v3\Base;


class GetRegistrantsRequest extends Base  {

	protected $_apiProperties=["Handle", "Name", "OrgName", "OrganisationNumber", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Status", "CreationFromDate", "CreationToDate", "OrderSort", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $Handle;
	protected $Name;
	protected $OrgName;
	protected $OrganisationNumber;
	protected $Address1;
	protected $Address2;
	protected $City;
	protected $State;
	protected $PostalCode;
	protected $CountryCode;
	protected $Phone;
	protected $Fax;
	protected $Email;
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
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setOrgName (?string $OrgName = null) : self {
		$this->set("OrgName", $OrgName);
		return $this;
	}
	public function getOrgName () : ?string {
		return $this->get("OrgName", "string");
	}
	public function setOrganisationNumber (?string $OrganisationNumber = null) : self {
		$this->set("OrganisationNumber", $OrganisationNumber);
		return $this;
	}
	public function getOrganisationNumber () : ?string {
		return $this->get("OrganisationNumber", "string");
	}
	public function setAddress1 (?string $Address1 = null) : self {
		$this->set("Address1", $Address1);
		return $this;
	}
	public function getAddress1 () : ?string {
		return $this->get("Address1", "string");
	}
	public function setAddress2 (?string $Address2 = null) : self {
		$this->set("Address2", $Address2);
		return $this;
	}
	public function getAddress2 () : ?string {
		return $this->get("Address2", "string");
	}
	public function setCity (?string $City = null) : self {
		$this->set("City", $City);
		return $this;
	}
	public function getCity () : ?string {
		return $this->get("City", "string");
	}
	public function setState (?string $State = null) : self {
		$this->set("State", $State);
		return $this;
	}
	public function getState () : ?string {
		return $this->get("State", "string");
	}
	public function setPostalCode (?string $PostalCode = null) : self {
		$this->set("PostalCode", $PostalCode);
		return $this;
	}
	public function getPostalCode () : ?string {
		return $this->get("PostalCode", "string");
	}
	public function setCountryCode (?string $CountryCode = null) : self {
		$this->set("CountryCode", $CountryCode);
		return $this;
	}
	public function getCountryCode () : ?string {
		return $this->get("CountryCode", "string");
	}
	public function setPhone (?string $Phone = null) : self {
		$this->set("Phone", $Phone);
		return $this;
	}
	public function getPhone () : ?string {
		return $this->get("Phone", "string");
	}
	public function setFax (?string $Fax = null) : self {
		$this->set("Fax", $Fax);
		return $this;
	}
	public function getFax () : ?string {
		return $this->get("Fax", "string");
	}
	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
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