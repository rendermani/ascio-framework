<?php

// XSLT-WSDL-Client. Generated PHP class of Contact

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\ContactDb;
use ascio\api\v3\ContactApi;


abstract class Contact extends DbBase  {

	protected $_apiProperties=["Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Type", "Details", "OrganisationNumber", "Extensions"];
	protected $_apiObjects=["Extensions"];
	protected $_substitutions = [
		["name" => "Registrant","type" => "\\ascio\\v3\\Registrant"] 
	];

	protected $Handle;
	protected $FirstName;
	protected $LastName;
	protected $OrgName;
	protected $Address1;
	protected $Address2;
	protected $City;
	protected $State;
	protected $PostalCode;
	protected $CountryCode;
	protected $Phone;
	protected $Fax;
	protected $Email;
	protected $Type;
	protected $Details;
	protected $OrganisationNumber;
	protected $Extensions;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ContactDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new ContactApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return ContactApi
	*/
	public function api($api = null) {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ContactDb|null $db
	* @return ContactDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setFirstName (?string $FirstName = null) : self {
		$this->set("FirstName", $FirstName);
		return $this;
	}
	public function getFirstName () : ?string {
		return $this->get("FirstName", "string");
	}
	public function setLastName (?string $LastName = null) : self {
		$this->set("LastName", $LastName);
		return $this;
	}
	public function getLastName () : ?string {
		return $this->get("LastName", "string");
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
	public function setType (?string $Type = null) : self {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setDetails (?string $Details = null) : self {
		$this->set("Details", $Details);
		return $this;
	}
	public function getDetails () : ?string {
		return $this->get("Details", "string");
	}
	public function setOrganisationNumber (?string $OrganisationNumber = null) : self {
		$this->set("OrganisationNumber", $OrganisationNumber);
		return $this;
	}
	public function getOrganisationNumber () : ?string {
		return $this->get("OrganisationNumber", "string");
	}
	public function setExtensions (?\ascio\v3\Extensions $Extensions = null) : self {
		$this->set("Extensions", $Extensions);
		return $this;
	}
	public function getExtensions () : ?\ascio\v3\Extensions {
		return $this->get("Extensions", "\\ascio\\v3\\Extensions");
	}
	public function createExtensions () : \ascio\v3\Extensions {
		return $this->create ("Extensions", "\\ascio\\v3\\Extensions");
	}
}