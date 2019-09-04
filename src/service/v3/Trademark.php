<?php

// XSLT-WSDL-Client. Generated PHP class of Trademark

namespace ascio\service\v3;
use ascio\v3\AbstractMark;
use ascio\db\v3\TrademarkDb;
use ascio\api\v3\TrademarkApi;
use ascio\api\v3\AbstractMarkApi;


abstract class Trademark extends AbstractMark  {

	protected $_apiProperties=["Handle", "MarkName", "MarkId", "AuthInfo", "ServiceType", "GoodsAndServicesDescription", "Labels", "ClaimEmailNotification1", "ClaimEmailNotification2", "ClaimEmailNotification3", "ClaimEmailNotification4", "ClaimEmailNotification5", "NotificationFrequency", "Owner", "Reseller", "Extensions", "ObjectComment", "ApplicationId", "RegistrationNumber", "ApplicationDate", "RegistrationDate", "ExpirationDate", "GoodsAndServicesClasses", "Jurisdiction"];
	protected $_apiObjects=["Labels", "Owner", "Reseller", "Extensions", "GoodsAndServicesClasses"];
	protected $_substituted = true;
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
	protected $ApplicationId;
	protected $RegistrationNumber;
	protected $ApplicationDate;
	protected $RegistrationDate;
	protected $ExpirationDate;
	protected $GoodsAndServicesClasses;
	protected $Jurisdiction;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new TrademarkDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param TrademarkDb|null $db
	* @return TrademarkDb
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
	public function setApplicationId (?string $ApplicationId = null) : self {
		$this->set("ApplicationId", $ApplicationId);
		return $this;
	}
	public function getApplicationId () : ?string {
		return $this->get("ApplicationId", "string");
	}
	public function setRegistrationNumber (?string $RegistrationNumber = null) : self {
		$this->set("RegistrationNumber", $RegistrationNumber);
		return $this;
	}
	public function getRegistrationNumber () : ?string {
		return $this->get("RegistrationNumber", "string");
	}
	public function setApplicationDate (?\DateTime $ApplicationDate = null) : self {
		$this->set("ApplicationDate", $ApplicationDate);
		return $this;
	}
	public function getApplicationDate () : ?\DateTime {
		return $this->get("ApplicationDate", "\\DateTime");
	}
	public function setRegistrationDate (?\DateTime $RegistrationDate = null) : self {
		$this->set("RegistrationDate", $RegistrationDate);
		return $this;
	}
	public function getRegistrationDate () : ?\DateTime {
		return $this->get("RegistrationDate", "\\DateTime");
	}
	public function setExpirationDate (?\DateTime $ExpirationDate = null) : self {
		$this->set("ExpirationDate", $ExpirationDate);
		return $this;
	}
	public function getExpirationDate () : ?\DateTime {
		return $this->get("ExpirationDate", "\\DateTime");
	}
	public function setGoodsAndServicesClasses (?\ascio\v3\ArrayOfint $GoodsAndServicesClasses = null) : self {
		$this->set("GoodsAndServicesClasses", $GoodsAndServicesClasses);
		return $this;
	}
	public function getGoodsAndServicesClasses () : ?\ascio\v3\ArrayOfint {
		return $this->get("GoodsAndServicesClasses", "\\ascio\\v3\\ArrayOfint");
	}
	public function createGoodsAndServicesClasses () : \ascio\v3\ArrayOfint {
		return $this->create ("GoodsAndServicesClasses", "\\ascio\\v3\\ArrayOfint");
	}
	public function setJurisdiction (?string $Jurisdiction = null) : self {
		$this->set("Jurisdiction", $Jurisdiction);
		return $this;
	}
	public function getJurisdiction () : ?string {
		return $this->get("Jurisdiction", "string");
	}
}