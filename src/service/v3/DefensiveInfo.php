<?php

// XSLT-WSDL-Client. Generated PHP class of DefensiveInfo

namespace ascio\service\v3;
use ascio\db\v3\DefensiveInfoDb;
use ascio\api\v3\DefensiveInfoApi;
use ascio\base\v3\DbBase;


class DefensiveInfo extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "Created", "Expires", "Name", "AuthInfo", "Encoding", "Owner", "Admin", "Tech", "Billing", "Reseller", "ObjectComment", "CustomerReference", "DefensiveType", "Trademark"];
	protected $_apiObjects=["Owner", "Admin", "Tech", "Billing", "Reseller", "CustomerReference", "Trademark"];
	protected $Handle;
	protected $Status;
	protected $Created;
	protected $Expires;
	protected $Name;
	protected $AuthInfo;
	protected $Encoding;
	protected $Owner;
	protected $Admin;
	protected $Tech;
	protected $Billing;
	protected $Reseller;
	protected $ObjectComment;
	protected $CustomerReference;
	protected $DefensiveType;
	protected $Trademark;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DefensiveInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DefensiveInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DefensiveInfoApi
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
	* @param DefensiveInfoDb|null $db
	* @return DefensiveInfoDb
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
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setExpires (?\DateTime $Expires = null) : self {
		$this->set("Expires", $Expires);
		return $this;
	}
	public function getExpires () : ?\DateTime {
		return $this->get("Expires", "\\DateTime");
	}
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setAuthInfo (?string $AuthInfo = null) : self {
		$this->set("AuthInfo", $AuthInfo);
		return $this;
	}
	public function getAuthInfo () : ?string {
		return $this->get("AuthInfo", "string");
	}
	public function setEncoding (?string $Encoding = null) : self {
		$this->set("Encoding", $Encoding);
		return $this;
	}
	public function getEncoding () : ?string {
		return $this->get("Encoding", "string");
	}
	public function setOwner (?\ascio\v3\Registrant $Owner = null) : self {
		$this->set("Owner", $Owner);
		return $this;
	}
	public function getOwner () : ?\ascio\v3\Registrant {
		return $this->get("Owner", "\\ascio\\v3\\Registrant");
	}
	public function createOwner () : \ascio\v3\Registrant {
		return $this->create ("Owner", "\\ascio\\v3\\Registrant");
	}
	public function setAdmin (?\ascio\v3\Contact $Admin = null) : self {
		$this->set("Admin", $Admin);
		return $this;
	}
	public function getAdmin () : ?\ascio\v3\Contact {
		return $this->get("Admin", "\\ascio\\v3\\Contact");
	}
	public function createAdmin () : \ascio\v3\Contact {
		return $this->create ("Admin", "\\ascio\\v3\\Contact");
	}
	public function setTech (?\ascio\v3\Contact $Tech = null) : self {
		$this->set("Tech", $Tech);
		return $this;
	}
	public function getTech () : ?\ascio\v3\Contact {
		return $this->get("Tech", "\\ascio\\v3\\Contact");
	}
	public function createTech () : \ascio\v3\Contact {
		return $this->create ("Tech", "\\ascio\\v3\\Contact");
	}
	public function setBilling (?\ascio\v3\Contact $Billing = null) : self {
		$this->set("Billing", $Billing);
		return $this;
	}
	public function getBilling () : ?\ascio\v3\Contact {
		return $this->get("Billing", "\\ascio\\v3\\Contact");
	}
	public function createBilling () : \ascio\v3\Contact {
		return $this->create ("Billing", "\\ascio\\v3\\Contact");
	}
	public function setReseller (?\ascio\v3\Contact $Reseller = null) : self {
		$this->set("Reseller", $Reseller);
		return $this;
	}
	public function getReseller () : ?\ascio\v3\Contact {
		return $this->get("Reseller", "\\ascio\\v3\\Contact");
	}
	public function createReseller () : \ascio\v3\Contact {
		return $this->create ("Reseller", "\\ascio\\v3\\Contact");
	}
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
	public function setCustomerReference (?\ascio\v3\CustomerReferenceInfo $CustomerReference = null) : self {
		$this->set("CustomerReference", $CustomerReference);
		return $this;
	}
	public function getCustomerReference () : ?\ascio\v3\CustomerReferenceInfo {
		return $this->get("CustomerReference", "\\ascio\\v3\\CustomerReferenceInfo");
	}
	public function createCustomerReference () : \ascio\v3\CustomerReferenceInfo {
		return $this->create ("CustomerReference", "\\ascio\\v3\\CustomerReferenceInfo");
	}
	public function setDefensiveType (?string $DefensiveType = null) : self {
		$this->set("DefensiveType", $DefensiveType);
		return $this;
	}
	public function getDefensiveType () : ?string {
		return $this->get("DefensiveType", "string");
	}
	public function setTrademark (?\ascio\v3\DomainTradeMark $Trademark = null) : self {
		$this->set("Trademark", $Trademark);
		return $this;
	}
	public function getTrademark () : ?\ascio\v3\DomainTradeMark {
		return $this->get("Trademark", "\\ascio\\v3\\DomainTradeMark");
	}
	public function createTrademark () : \ascio\v3\DomainTradeMark {
		return $this->create ("Trademark", "\\ascio\\v3\\DomainTradeMark");
	}
}