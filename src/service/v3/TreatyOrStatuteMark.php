<?php

// XSLT-WSDL-Client. Generated PHP class of TreatyOrStatuteMark

namespace ascio\service\v3;
use ascio\v3\AbstractMark;
use ascio\db\v3\TreatyOrStatuteMarkDb;
use ascio\api\v3\TreatyOrStatuteMarkApi;
use ascio\api\v3\AbstractMarkApi;


class TreatyOrStatuteMark extends AbstractMark  {

	protected $_apiProperties=["Handle", "MarkName", "MarkId", "AuthInfo", "ServiceType", "GoodsAndServicesDescription", "Labels", "ClaimEmailNotification1", "ClaimEmailNotification2", "ClaimEmailNotification3", "ClaimEmailNotification4", "ClaimEmailNotification5", "NotificationFrequency", "Owner", "Reseller", "Extensions", "ObjectComment", "Title", "ReferenceNumber", "Country", "Region", "ProtectionDate", "ExecutionDate"];
	protected $_apiObjects=["Labels", "Owner", "Reseller", "Extensions"];
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
	protected $Title;
	protected $ReferenceNumber;
	protected $Country;
	protected $Region;
	protected $ProtectionDate;
	protected $ExecutionDate;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new TreatyOrStatuteMarkDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param TreatyOrStatuteMarkDb|null $db
	* @return TreatyOrStatuteMarkDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setTitle (?string $Title = null) : self {
		$this->set("Title", $Title);
		return $this;
	}
	public function getTitle () : ?string {
		return $this->get("Title", "string");
	}
	public function setReferenceNumber (?string $ReferenceNumber = null) : self {
		$this->set("ReferenceNumber", $ReferenceNumber);
		return $this;
	}
	public function getReferenceNumber () : ?string {
		return $this->get("ReferenceNumber", "string");
	}
	public function setCountry (?string $Country = null) : self {
		$this->set("Country", $Country);
		return $this;
	}
	public function getCountry () : ?string {
		return $this->get("Country", "string");
	}
	public function setRegion (?string $Region = null) : self {
		$this->set("Region", $Region);
		return $this;
	}
	public function getRegion () : ?string {
		return $this->get("Region", "string");
	}
	public function setProtectionDate (?\DateTime $ProtectionDate = null) : self {
		$this->set("ProtectionDate", $ProtectionDate);
		return $this;
	}
	public function getProtectionDate () : ?\DateTime {
		return $this->get("ProtectionDate", "\\DateTime");
	}
	public function setExecutionDate (?\DateTime $ExecutionDate = null) : self {
		$this->set("ExecutionDate", $ExecutionDate);
		return $this;
	}
	public function getExecutionDate () : ?\DateTime {
		return $this->get("ExecutionDate", "\\DateTime");
	}
}