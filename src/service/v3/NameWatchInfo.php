<?php

// XSLT-WSDL-Client. Generated PHP class of NameWatchInfo

namespace ascio\service\v3;
use ascio\db\v3\NameWatchInfoDb;
use ascio\api\v3\NameWatchInfoApi;
use ascio\base\v3\DbBase;


class NameWatchInfo extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "Created", "Expires", "Name", "NotificationFrequency", "Tier", "EmailNotification1", "EmailNotification2", "EmailNotification3", "EmailNotification4", "EmailNotification5", "Owner", "Reseller", "ObjectComment", "CustomerReference", "ReportUrl"];
	protected $_apiObjects=["Owner", "Reseller", "CustomerReference"];
	protected $Handle;
	protected $Status;
	protected $Created;
	protected $Expires;
	protected $Name;
	protected $NotificationFrequency;
	protected $Tier;
	protected $EmailNotification1;
	protected $EmailNotification2;
	protected $EmailNotification3;
	protected $EmailNotification4;
	protected $EmailNotification5;
	protected $Owner;
	protected $Reseller;
	protected $ObjectComment;
	protected $CustomerReference;
	protected $ReportUrl;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new NameWatchInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new NameWatchInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return NameWatchInfoApi
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
	* @param NameWatchInfoDb|null $db
	* @return NameWatchInfoDb
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
	public function setNotificationFrequency (?string $NotificationFrequency = null) : self {
		$this->set("NotificationFrequency", $NotificationFrequency);
		return $this;
	}
	public function getNotificationFrequency () : ?string {
		return $this->get("NotificationFrequency", "string");
	}
	public function setTier (?int $Tier = null) : self {
		$this->set("Tier", $Tier);
		return $this;
	}
	public function getTier () : ?int {
		return $this->get("Tier", "int");
	}
	public function setEmailNotification1 (?string $EmailNotification1 = null) : self {
		$this->set("EmailNotification1", $EmailNotification1);
		return $this;
	}
	public function getEmailNotification1 () : ?string {
		return $this->get("EmailNotification1", "string");
	}
	public function setEmailNotification2 (?string $EmailNotification2 = null) : self {
		$this->set("EmailNotification2", $EmailNotification2);
		return $this;
	}
	public function getEmailNotification2 () : ?string {
		return $this->get("EmailNotification2", "string");
	}
	public function setEmailNotification3 (?string $EmailNotification3 = null) : self {
		$this->set("EmailNotification3", $EmailNotification3);
		return $this;
	}
	public function getEmailNotification3 () : ?string {
		return $this->get("EmailNotification3", "string");
	}
	public function setEmailNotification4 (?string $EmailNotification4 = null) : self {
		$this->set("EmailNotification4", $EmailNotification4);
		return $this;
	}
	public function getEmailNotification4 () : ?string {
		return $this->get("EmailNotification4", "string");
	}
	public function setEmailNotification5 (?string $EmailNotification5 = null) : self {
		$this->set("EmailNotification5", $EmailNotification5);
		return $this;
	}
	public function getEmailNotification5 () : ?string {
		return $this->get("EmailNotification5", "string");
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
	public function setReportUrl (?string $ReportUrl = null) : self {
		$this->set("ReportUrl", $ReportUrl);
		return $this;
	}
	public function getReportUrl () : ?string {
		return $this->get("ReportUrl", "string");
	}
}