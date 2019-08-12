<?php

// XSLT-WSDL-Client. Generated PHP class of DefensiveInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\DefensiveInfoDb;
use ascio\api\v3\DefensiveInfoApi;


class DefensiveInfo extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "Created", "Expires", "Name", "AuthInfo", "Encoding", "Owner", "Admin", "Tech", "Billing", "Reseller", "ObjectComment"];
	protected $_apiObjects=["Owner", "Admin", "Tech", "Billing", "Reseller"];
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
	public function api($api = null) {
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
	public function setHandle (?string $Handle = null) : \ascio\v3\DefensiveInfo {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setStatus (?string $Status = null) : \ascio\v3\DefensiveInfo {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreated (?\DateTime $Created = null) : \ascio\v3\DefensiveInfo {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setExpires (?\DateTime $Expires = null) : \ascio\v3\DefensiveInfo {
		$this->set("Expires", $Expires);
		return $this;
	}
	public function getExpires () : ?\DateTime {
		return $this->get("Expires", "\\DateTime");
	}
	public function setName (?string $Name = null) : \ascio\v3\DefensiveInfo {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setAuthInfo (?string $AuthInfo = null) : \ascio\v3\DefensiveInfo {
		$this->set("AuthInfo", $AuthInfo);
		return $this;
	}
	public function getAuthInfo () : ?string {
		return $this->get("AuthInfo", "string");
	}
	public function setEncoding (?string $Encoding = null) : \ascio\v3\DefensiveInfo {
		$this->set("Encoding", $Encoding);
		return $this;
	}
	public function getEncoding () : ?string {
		return $this->get("Encoding", "string");
	}
	public function setOwner (?\ascio\v3\Registrant $Owner = null) : \ascio\v3\DefensiveInfo {
		$this->set("Owner", $Owner);
		return $this;
	}
	public function getOwner () : ?\ascio\v3\Registrant {
		return $this->get("Owner", "\\ascio\\v3\\Registrant");
	}
	public function createOwner () : \ascio\v3\Registrant {
		return $this->create ("Owner", "\\ascio\\v3\\Registrant");
	}
	public function setAdmin (?\ascio\v3\Contact $Admin = null) : \ascio\v3\DefensiveInfo {
		$this->set("Admin", $Admin);
		return $this;
	}
	public function getAdmin () : ?\ascio\v3\Contact {
		return $this->get("Admin", "\\ascio\\v3\\Contact");
	}
	public function createAdmin () : \ascio\v3\Contact {
		return $this->create ("Admin", "\\ascio\\v3\\Contact");
	}
	public function setTech (?\ascio\v3\Contact $Tech = null) : \ascio\v3\DefensiveInfo {
		$this->set("Tech", $Tech);
		return $this;
	}
	public function getTech () : ?\ascio\v3\Contact {
		return $this->get("Tech", "\\ascio\\v3\\Contact");
	}
	public function createTech () : \ascio\v3\Contact {
		return $this->create ("Tech", "\\ascio\\v3\\Contact");
	}
	public function setBilling (?\ascio\v3\Contact $Billing = null) : \ascio\v3\DefensiveInfo {
		$this->set("Billing", $Billing);
		return $this;
	}
	public function getBilling () : ?\ascio\v3\Contact {
		return $this->get("Billing", "\\ascio\\v3\\Contact");
	}
	public function createBilling () : \ascio\v3\Contact {
		return $this->create ("Billing", "\\ascio\\v3\\Contact");
	}
	public function setReseller (?\ascio\v3\Contact $Reseller = null) : \ascio\v3\DefensiveInfo {
		$this->set("Reseller", $Reseller);
		return $this;
	}
	public function getReseller () : ?\ascio\v3\Contact {
		return $this->get("Reseller", "\\ascio\\v3\\Contact");
	}
	public function createReseller () : \ascio\v3\Contact {
		return $this->create ("Reseller", "\\ascio\\v3\\Contact");
	}
	public function setObjectComment (?string $ObjectComment = null) : \ascio\v3\DefensiveInfo {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
}