<?php

// XSLT-WSDL-Client. Generated PHP class of Defensive

namespace ascio\service\v3;
use ascio\db\v3\DefensiveDb;
use ascio\api\v3\DefensiveApi;
use ascio\base\v3\DbBase;


class Defensive extends DbBase  {

	protected $_apiProperties=["Handle", "Name", "MarkHandle", "AuthInfo", "Encoding", "Owner", "Admin", "Tech", "Billing", "Reseller", "ObjectComment", "Trademark"];
	protected $_apiObjects=["Owner", "Admin", "Tech", "Billing", "Reseller", "Trademark"];
	protected $Handle;
	protected $Name;
	protected $MarkHandle;
	protected $AuthInfo;
	protected $Encoding;
	protected $Owner;
	protected $Admin;
	protected $Tech;
	protected $Billing;
	protected $Reseller;
	protected $ObjectComment;
	protected $Trademark;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DefensiveDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DefensiveApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DefensiveApi
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
	* @param DefensiveDb|null $db
	* @return DefensiveDb
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
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setMarkHandle (?string $MarkHandle = null) : self {
		$this->set("MarkHandle", $MarkHandle);
		return $this;
	}
	public function getMarkHandle () : ?string {
		return $this->get("MarkHandle", "string");
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