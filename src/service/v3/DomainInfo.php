<?php

// XSLT-WSDL-Client. Generated PHP class of DomainInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\DomainInfoDb;
use ascio\api\v3\DomainInfoApi;


class DomainInfo extends DbBase  {

	protected $_apiProperties=["DomainName", "DomainHandle", "RegPeriod", "RenewPeriod", "Status", "AuthInfo", "CreDate", "ExpDate", "EncodingType", "DomainPurpose", "Comment", "TransferLock", "DeleteLock", "UpdateLock", "QueueType", "Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy", "DomainType", "DiscloseSocialData", "LocalPresence"];
	protected $_apiObjects=["Owner", "Admin", "Tech", "Billing", "Reseller", "NameServers", "Trademark", "DnsSecKeys", "PrivacyProxy"];
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
	protected $Owner;
	protected $Admin;
	protected $Tech;
	protected $Billing;
	protected $Reseller;
	protected $NameServers;
	protected $Trademark;
	protected $DnsSecKeys;
	protected $PrivacyProxy;
	protected $DomainType;
	protected $DiscloseSocialData;
	protected $LocalPresence;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DomainInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DomainInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DomainInfoApi
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
	* @param DomainInfoDb|null $db
	* @return DomainInfoDb
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
	public function setNameServers (?\ascio\v3\NameServers $NameServers = null) : self {
		$this->set("NameServers", $NameServers);
		return $this;
	}
	public function getNameServers () : ?\ascio\v3\NameServers {
		return $this->get("NameServers", "\\ascio\\v3\\NameServers");
	}
	public function createNameServers () : \ascio\v3\NameServers {
		return $this->create ("NameServers", "\\ascio\\v3\\NameServers");
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
	public function setDnsSecKeys (?\ascio\v3\DnsSecKeys $DnsSecKeys = null) : self {
		$this->set("DnsSecKeys", $DnsSecKeys);
		return $this;
	}
	public function getDnsSecKeys () : ?\ascio\v3\DnsSecKeys {
		return $this->get("DnsSecKeys", "\\ascio\\v3\\DnsSecKeys");
	}
	public function createDnsSecKeys () : \ascio\v3\DnsSecKeys {
		return $this->create ("DnsSecKeys", "\\ascio\\v3\\DnsSecKeys");
	}
	public function setPrivacyProxy (?\ascio\v3\PrivacyProxy $PrivacyProxy = null) : self {
		$this->set("PrivacyProxy", $PrivacyProxy);
		return $this;
	}
	public function getPrivacyProxy () : ?\ascio\v3\PrivacyProxy {
		return $this->get("PrivacyProxy", "\\ascio\\v3\\PrivacyProxy");
	}
	public function createPrivacyProxy () : \ascio\v3\PrivacyProxy {
		return $this->create ("PrivacyProxy", "\\ascio\\v3\\PrivacyProxy");
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
	public function setLocalPresence (?bool $LocalPresence = null) : self {
		$this->set("LocalPresence", $LocalPresence);
		return $this;
	}
	public function getLocalPresence () : ?bool {
		return $this->get("LocalPresence", "bool");
	}
}