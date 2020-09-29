<?php

// XSLT-WSDL-Client. Generated PHP class of Registrant

namespace ascio\service\v2;
use ascio\db\v2\RegistrantDb;
use ascio\api\v2\RegistrantApi;
use ascio\base\v2\DbBase;


class Registrant extends DbBase  {

	protected $_apiProperties=["CreDate", "Status", "Handle", "Name", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Email", "Phone", "Fax", "RegistrantType", "VatNumber", "RegistrantDate", "NexusCategory", "RegistrantNumber", "Details"];
	protected $_apiObjects=[];
	protected $CreDate;
	protected $Status;
	protected $Handle;
	protected $Name;
	protected $OrgName;
	protected $Address1;
	protected $Address2;
	protected $City;
	protected $State;
	protected $PostalCode;
	protected $CountryCode;
	protected $Email;
	protected $Phone;
	protected $Fax;
	protected $RegistrantType;
	protected $VatNumber;
	protected $RegistrantDate;
	protected $NexusCategory;
	protected $RegistrantNumber;
	protected $Details;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new RegistrantDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new RegistrantApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return RegistrantApi
	*/
	public function api($api = null) : ?\ascio\base\ApiModelBase {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param RegistrantDb|null $db
	* @return RegistrantDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCreDate (?\DateTime $CreDate = null) : self {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?\DateTime {
		return $this->get("CreDate", "\\DateTime");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
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
	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
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
	public function setRegistrantType (?string $RegistrantType = null) : self {
		$this->set("RegistrantType", $RegistrantType);
		return $this;
	}
	public function getRegistrantType () : ?string {
		return $this->get("RegistrantType", "string");
	}
	public function setVatNumber (?string $VatNumber = null) : self {
		$this->set("VatNumber", $VatNumber);
		return $this;
	}
	public function getVatNumber () : ?string {
		return $this->get("VatNumber", "string");
	}
	public function setRegistrantDate (?string $RegistrantDate = null) : self {
		$this->set("RegistrantDate", $RegistrantDate);
		return $this;
	}
	public function getRegistrantDate () : ?string {
		return $this->get("RegistrantDate", "string");
	}
	public function setNexusCategory (?string $NexusCategory = null) : self {
		$this->set("NexusCategory", $NexusCategory);
		return $this;
	}
	public function getNexusCategory () : ?string {
		return $this->get("NexusCategory", "string");
	}
	public function setRegistrantNumber (?string $RegistrantNumber = null) : self {
		$this->set("RegistrantNumber", $RegistrantNumber);
		return $this;
	}
	public function getRegistrantNumber () : ?string {
		return $this->get("RegistrantNumber", "string");
	}
	public function setDetails (?string $Details = null) : self {
		$this->set("Details", $Details);
		return $this;
	}
	public function getDetails () : ?string {
		return $this->get("Details", "string");
	}
}