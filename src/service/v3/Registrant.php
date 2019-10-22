<?php

// XSLT-WSDL-Client. Generated PHP class of Registrant

namespace ascio\service\v3;
use ascio\v3\Contact;
use ascio\db\v3\RegistrantDb;
use ascio\api\v3\RegistrantApi;
use ascio\api\v3\ContactApi;


abstract class Registrant extends Contact  {

	protected $_apiProperties=["Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Type", "Details", "OrganisationNumber", "Extensions", "VatNumber", "NexusCategory"];
	protected $_apiObjects=["Extensions"];
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
	protected $VatNumber;
	protected $NexusCategory;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new RegistrantDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new RegistrantApi($this);
		$api->parent($this);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return RegistrantApi
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
	/**
	* Getters and setters for API-Properties
	*/
	public function setVatNumber (?string $VatNumber = null) : self {
		$this->set("VatNumber", $VatNumber);
		return $this;
	}
	public function getVatNumber () : ?string {
		return $this->get("VatNumber", "string");
	}
	public function setNexusCategory (?string $NexusCategory = null) : self {
		$this->set("NexusCategory", $NexusCategory);
		return $this;
	}
	public function getNexusCategory () : ?string {
		return $this->get("NexusCategory", "string");
	}
}