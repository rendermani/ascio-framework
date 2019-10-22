<?php

// XSLT-WSDL-Client. Generated PHP class of AbstractMark

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AbstractMarkDb;
use ascio\api\v3\AbstractMarkApi;


abstract class AbstractMark extends DbBase  {

	protected $_apiProperties=["Handle", "MarkName", "MarkId", "AuthInfo", "ServiceType", "GoodsAndServicesDescription", "Labels", "ClaimEmailNotification1", "ClaimEmailNotification2", "ClaimEmailNotification3", "ClaimEmailNotification4", "ClaimEmailNotification5", "NotificationFrequency", "Owner", "Reseller", "Extensions", "ObjectComment"];
	protected $_apiObjects=["Labels", "Owner", "Reseller", "Extensions"];
	protected $_substitutions = [
		["name" => "TreatyOrStatuteMark","type" => "\\ascio\\v3\\TreatyOrStatuteMark"], 
		["name" => "Trademark","type" => "\\ascio\\v3\\Trademark"], 
		["name" => "CourtValidatedMark","type" => "\\ascio\\v3\\CourtValidatedMark"] 
	];

	protected $Handle;
	protected $MarkName;
	protected $MarkId;
	protected $AuthInfo;
	protected $ServiceType;
	protected $GoodsAndServicesDescription;
	protected $Labels;
	protected $ClaimEmailNotification1;
	protected $ClaimEmailNotification2;
	protected $ClaimEmailNotification3;
	protected $ClaimEmailNotification4;
	protected $ClaimEmailNotification5;
	protected $NotificationFrequency;
	protected $Owner;
	protected $Reseller;
	protected $Extensions;
	protected $ObjectComment;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AbstractMarkDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new AbstractMarkApi($this);
		$api->parent($this);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return AbstractMarkApi
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
	* @param AbstractMarkDb|null $db
	* @return AbstractMarkDb
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
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setMarkName (?string $MarkName = null) : self {
		$this->set("MarkName", $MarkName);
		return $this;
	}
	public function getMarkName () : ?string {
		return $this->get("MarkName", "string");
	}
	public function setMarkId (?string $MarkId = null) : self {
		$this->set("MarkId", $MarkId);
		return $this;
	}
	public function getMarkId () : ?string {
		return $this->get("MarkId", "string");
	}
	public function setAuthInfo (?string $AuthInfo = null) : self {
		$this->set("AuthInfo", $AuthInfo);
		return $this;
	}
	public function getAuthInfo () : ?string {
		return $this->get("AuthInfo", "string");
	}
	public function setServiceType (?string $ServiceType = null) : self {
		$this->set("ServiceType", $ServiceType);
		return $this;
	}
	public function getServiceType () : ?string {
		return $this->get("ServiceType", "string");
	}
	public function setGoodsAndServicesDescription (?string $GoodsAndServicesDescription = null) : self {
		$this->set("GoodsAndServicesDescription", $GoodsAndServicesDescription);
		return $this;
	}
	public function getGoodsAndServicesDescription () : ?string {
		return $this->get("GoodsAndServicesDescription", "string");
	}
	public function setLabels (?\ascio\v3\ArrayOfstring $Labels = null) : self {
		$this->set("Labels", $Labels);
		return $this;
	}
	public function getLabels () : ?\ascio\v3\ArrayOfstring {
		return $this->get("Labels", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createLabels () : \ascio\v3\ArrayOfstring {
		return $this->create ("Labels", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setClaimEmailNotification1 (?string $ClaimEmailNotification1 = null) : self {
		$this->set("ClaimEmailNotification1", $ClaimEmailNotification1);
		return $this;
	}
	public function getClaimEmailNotification1 () : ?string {
		return $this->get("ClaimEmailNotification1", "string");
	}
	public function setClaimEmailNotification2 (?string $ClaimEmailNotification2 = null) : self {
		$this->set("ClaimEmailNotification2", $ClaimEmailNotification2);
		return $this;
	}
	public function getClaimEmailNotification2 () : ?string {
		return $this->get("ClaimEmailNotification2", "string");
	}
	public function setClaimEmailNotification3 (?string $ClaimEmailNotification3 = null) : self {
		$this->set("ClaimEmailNotification3", $ClaimEmailNotification3);
		return $this;
	}
	public function getClaimEmailNotification3 () : ?string {
		return $this->get("ClaimEmailNotification3", "string");
	}
	public function setClaimEmailNotification4 (?string $ClaimEmailNotification4 = null) : self {
		$this->set("ClaimEmailNotification4", $ClaimEmailNotification4);
		return $this;
	}
	public function getClaimEmailNotification4 () : ?string {
		return $this->get("ClaimEmailNotification4", "string");
	}
	public function setClaimEmailNotification5 (?string $ClaimEmailNotification5 = null) : self {
		$this->set("ClaimEmailNotification5", $ClaimEmailNotification5);
		return $this;
	}
	public function getClaimEmailNotification5 () : ?string {
		return $this->get("ClaimEmailNotification5", "string");
	}
	public function setNotificationFrequency (?string $NotificationFrequency = null) : self {
		$this->set("NotificationFrequency", $NotificationFrequency);
		return $this;
	}
	public function getNotificationFrequency () : ?string {
		return $this->get("NotificationFrequency", "string");
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
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
}