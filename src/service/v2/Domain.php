<?php

// XSLT-WSDL-Client. Generated PHP class of Domain

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\DomainDb;
use ascio\api\v2\DomainApi;


abstract class Domain extends DbBase  {

	protected $_apiProperties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "CreDate", "ExpDate", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData"];
	protected $_apiObjects=["Registrant", "AdminContact", "TechContact", "BillingContact", "ResellerContact", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy"];
	protected $DomainName;
	protected $DomainHandle;
	protected $RegPeriod;
	protected $RenewPeriod;
	protected $Status;
	protected $AuthInfo;
	protected $CreDate;
	protected $ExpDate;
	protected $EncodingType;
	protected $DomainPurpose;
	protected $Comment;
	protected $TransferLock;
	protected $DeleteLock;
	protected $UpdateLock;
	protected $QueueType;
	protected $Registrant;
	protected $AdminContact;
	protected $TechContact;
	protected $BillingContact;
	protected $ResellerContact;
	protected $NameServers;
	protected $Trademark;
	protected $DnsSecKeys;
	protected $PrivacyProxy;
	protected $DomainType;
	protected $DiscloseSocialData;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DomainDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DomainApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DomainApi
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
	* @param DomainDb|null $db
	* @return DomainDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setDomainName (?string $DomainName = null) : self {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setDomainHandle (?string $DomainHandle = null) : self {
		$this->set("DomainHandle", $DomainHandle);
		return $this;
	}
	public function getDomainHandle () : ?string {
		return $this->get("DomainHandle", "string");
	}
	public function setRegPeriod (?int $RegPeriod = null) : self {
		$this->set("RegPeriod", $RegPeriod);
		return $this;
	}
	public function getRegPeriod () : ?int {
		return $this->get("RegPeriod", "int");
	}
	public function setRenewPeriod (?int $RenewPeriod = null) : self {
		$this->set("RenewPeriod", $RenewPeriod);
		return $this;
	}
	public function getRenewPeriod () : ?int {
		return $this->get("RenewPeriod", "int");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setAuthInfo (?string $AuthInfo = null) : self {
		$this->set("AuthInfo", $AuthInfo);
		return $this;
	}
	public function getAuthInfo () : ?string {
		return $this->get("AuthInfo", "string");
	}
	public function setCreDate (?\DateTime $CreDate = null) : self {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?\DateTime {
		return $this->get("CreDate", "\\DateTime");
	}
	public function setExpDate (?\DateTime $ExpDate = null) : self {
		$this->set("ExpDate", $ExpDate);
		return $this;
	}
	public function getExpDate () : ?\DateTime {
		return $this->get("ExpDate", "\\DateTime");
	}
	public function setEncodingType (?string $EncodingType = null) : self {
		$this->set("EncodingType", $EncodingType);
		return $this;
	}
	public function getEncodingType () : ?string {
		return $this->get("EncodingType", "string");
	}
	public function setDomainPurpose (?string $DomainPurpose = null) : self {
		$this->set("DomainPurpose", $DomainPurpose);
		return $this;
	}
	public function getDomainPurpose () : ?string {
		return $this->get("DomainPurpose", "string");
	}
	public function setComment (?string $Comment = null) : self {
		$this->set("Comment", $Comment);
		return $this;
	}
	public function getComment () : ?string {
		return $this->get("Comment", "string");
	}
	public function setTransferLock (?string $TransferLock = null) : self {
		$this->set("TransferLock", $TransferLock);
		return $this;
	}
	public function getTransferLock () : ?string {
		return $this->get("TransferLock", "string");
	}
	public function setDeleteLock (?string $DeleteLock = null) : self {
		$this->set("DeleteLock", $DeleteLock);
		return $this;
	}
	public function getDeleteLock () : ?string {
		return $this->get("DeleteLock", "string");
	}
	public function setUpdateLock (?string $UpdateLock = null) : self {
		$this->set("UpdateLock", $UpdateLock);
		return $this;
	}
	public function getUpdateLock () : ?string {
		return $this->get("UpdateLock", "string");
	}
	public function setQueueType (?string $QueueType = null) : self {
		$this->set("QueueType", $QueueType);
		return $this;
	}
	public function getQueueType () : ?string {
		return $this->get("QueueType", "string");
	}
	public function setRegistrant (?\ascio\v2\Registrant $Registrant = null) : self {
		$this->set("Registrant", $Registrant);
		return $this;
	}
	public function getRegistrant () : ?\ascio\v2\Registrant {
		return $this->get("Registrant", "\\ascio\\v2\\Registrant");
	}
	public function createRegistrant () : \ascio\v2\Registrant {
		return $this->create ("Registrant", "\\ascio\\v2\\Registrant");
	}
	public function setAdminContact (?\ascio\v2\Contact $AdminContact = null) : self {
		$this->set("AdminContact", $AdminContact);
		return $this;
	}
	public function getAdminContact () : ?\ascio\v2\Contact {
		return $this->get("AdminContact", "\\ascio\\v2\\Contact");
	}
	public function createAdminContact () : \ascio\v2\Contact {
		return $this->create ("AdminContact", "\\ascio\\v2\\Contact");
	}
	public function setTechContact (?\ascio\v2\Contact $TechContact = null) : self {
		$this->set("TechContact", $TechContact);
		return $this;
	}
	public function getTechContact () : ?\ascio\v2\Contact {
		return $this->get("TechContact", "\\ascio\\v2\\Contact");
	}
	public function createTechContact () : \ascio\v2\Contact {
		return $this->create ("TechContact", "\\ascio\\v2\\Contact");
	}
	public function setBillingContact (?\ascio\v2\Contact $BillingContact = null) : self {
		$this->set("BillingContact", $BillingContact);
		return $this;
	}
	public function getBillingContact () : ?\ascio\v2\Contact {
		return $this->get("BillingContact", "\\ascio\\v2\\Contact");
	}
	public function createBillingContact () : \ascio\v2\Contact {
		return $this->create ("BillingContact", "\\ascio\\v2\\Contact");
	}
	public function setResellerContact (?\ascio\v2\Contact $ResellerContact = null) : self {
		$this->set("ResellerContact", $ResellerContact);
		return $this;
	}
	public function getResellerContact () : ?\ascio\v2\Contact {
		return $this->get("ResellerContact", "\\ascio\\v2\\Contact");
	}
	public function createResellerContact () : \ascio\v2\Contact {
		return $this->create ("ResellerContact", "\\ascio\\v2\\Contact");
	}
	public function setNameServers (?\ascio\v2\NameServers $NameServers = null) : self {
		$this->set("NameServers", $NameServers);
		return $this;
	}
	public function getNameServers () : ?\ascio\v2\NameServers {
		return $this->get("NameServers", "\\ascio\\v2\\NameServers");
	}
	public function createNameServers () : \ascio\v2\NameServers {
		return $this->create ("NameServers", "\\ascio\\v2\\NameServers");
	}
	public function setTrademark (?\ascio\v2\TradeMark $Trademark = null) : self {
		$this->set("Trademark", $Trademark);
		return $this;
	}
	public function getTrademark () : ?\ascio\v2\TradeMark {
		return $this->get("Trademark", "\\ascio\\v2\\TradeMark");
	}
	public function createTrademark () : \ascio\v2\TradeMark {
		return $this->create ("Trademark", "\\ascio\\v2\\TradeMark");
	}
	public function setDnsSecKeys (?\ascio\v2\DnsSecKeys $DnsSecKeys = null) : self {
		$this->set("DnsSecKeys", $DnsSecKeys);
		return $this;
	}
	public function getDnsSecKeys () : ?\ascio\v2\DnsSecKeys {
		return $this->get("DnsSecKeys", "\\ascio\\v2\\DnsSecKeys");
	}
	public function createDnsSecKeys () : \ascio\v2\DnsSecKeys {
		return $this->create ("DnsSecKeys", "\\ascio\\v2\\DnsSecKeys");
	}
	public function setPrivacyProxy (?\ascio\v2\PrivacyProxy $PrivacyProxy = null) : self {
		$this->set("PrivacyProxy", $PrivacyProxy);
		return $this;
	}
	public function getPrivacyProxy () : ?\ascio\v2\PrivacyProxy {
		return $this->get("PrivacyProxy", "\\ascio\\v2\\PrivacyProxy");
	}
	public function createPrivacyProxy () : \ascio\v2\PrivacyProxy {
		return $this->create ("PrivacyProxy", "\\ascio\\v2\\PrivacyProxy");
	}
	public function setDomainType (?string $DomainType = null) : self {
		$this->set("DomainType", $DomainType);
		return $this;
	}
	public function getDomainType () : ?string {
		return $this->get("DomainType", "string");
	}
	public function setDiscloseSocialData (?string $DiscloseSocialData = null) : self {
		$this->set("DiscloseSocialData", $DiscloseSocialData);
		return $this;
	}
	public function getDiscloseSocialData () : ?string {
		return $this->get("DiscloseSocialData", "string");
	}
}