<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountBalanceResponse

namespace ascio\service\v3;
use ascio\db\v3\GetAccountBalanceResponseDb;
use ascio\api\v3\GetAccountBalanceResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetAccountBalanceResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Currency", "Vat", "UnInvoicedOrders", "UnInvoicedOpenOrders", "UnInvoicedCompletedOrders", "UnInvoicedCompletedOrdersLast24h", "AccountBalance", "CurrentBalance", "ReminderThreshold", "BlockingThreshold", "ReminderEmailAddress", "InvoiceEmailAddress", "LastReminderSent", "NumberOfRemindersSent", "LastBlockedAccountMessageSent", "NumberOfBlockedAccountMessagesSent", "StandingAccountBalance"];
	protected $_apiObjects=["Errors", "ReminderEmailAddress", "InvoiceEmailAddress"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Currency;
	protected $Vat;
	protected $UnInvoicedOrders;
	protected $UnInvoicedOpenOrders;
	protected $UnInvoicedCompletedOrders;
	protected $UnInvoicedCompletedOrdersLast24h;
	protected $AccountBalance;
	protected $CurrentBalance;
	protected $ReminderThreshold;
	protected $BlockingThreshold;
	protected $ReminderEmailAddress;
	protected $InvoiceEmailAddress;
	protected $LastReminderSent;
	protected $NumberOfRemindersSent;
	protected $LastBlockedAccountMessageSent;
	protected $NumberOfBlockedAccountMessagesSent;
	protected $StandingAccountBalance;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetAccountBalanceResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetAccountBalanceResponseDb|null $db
	* @return GetAccountBalanceResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
	}
	public function setVat (?float $Vat = null) : self {
		$this->set("Vat", $Vat);
		return $this;
	}
	public function getVat () : ?float {
		return $this->get("Vat", "float");
	}
	public function setUnInvoicedOrders (?float $UnInvoicedOrders = null) : self {
		$this->set("UnInvoicedOrders", $UnInvoicedOrders);
		return $this;
	}
	public function getUnInvoicedOrders () : ?float {
		return $this->get("UnInvoicedOrders", "float");
	}
	public function setUnInvoicedOpenOrders (?float $UnInvoicedOpenOrders = null) : self {
		$this->set("UnInvoicedOpenOrders", $UnInvoicedOpenOrders);
		return $this;
	}
	public function getUnInvoicedOpenOrders () : ?float {
		return $this->get("UnInvoicedOpenOrders", "float");
	}
	public function setUnInvoicedCompletedOrders (?float $UnInvoicedCompletedOrders = null) : self {
		$this->set("UnInvoicedCompletedOrders", $UnInvoicedCompletedOrders);
		return $this;
	}
	public function getUnInvoicedCompletedOrders () : ?float {
		return $this->get("UnInvoicedCompletedOrders", "float");
	}
	public function setUnInvoicedCompletedOrdersLast24h (?float $UnInvoicedCompletedOrdersLast24h = null) : self {
		$this->set("UnInvoicedCompletedOrdersLast24h", $UnInvoicedCompletedOrdersLast24h);
		return $this;
	}
	public function getUnInvoicedCompletedOrdersLast24h () : ?float {
		return $this->get("UnInvoicedCompletedOrdersLast24h", "float");
	}
	public function setAccountBalance (?float $AccountBalance = null) : self {
		$this->set("AccountBalance", $AccountBalance);
		return $this;
	}
	public function getAccountBalance () : ?float {
		return $this->get("AccountBalance", "float");
	}
	public function setCurrentBalance (?float $CurrentBalance = null) : self {
		$this->set("CurrentBalance", $CurrentBalance);
		return $this;
	}
	public function getCurrentBalance () : ?float {
		return $this->get("CurrentBalance", "float");
	}
	public function setReminderThreshold (?float $ReminderThreshold = null) : self {
		$this->set("ReminderThreshold", $ReminderThreshold);
		return $this;
	}
	public function getReminderThreshold () : ?float {
		return $this->get("ReminderThreshold", "float");
	}
	public function setBlockingThreshold (?float $BlockingThreshold = null) : self {
		$this->set("BlockingThreshold", $BlockingThreshold);
		return $this;
	}
	public function getBlockingThreshold () : ?float {
		return $this->get("BlockingThreshold", "float");
	}
	public function setReminderEmailAddress (?\ascio\v3\ArrayOfstring $ReminderEmailAddress = null) : self {
		$this->set("ReminderEmailAddress", $ReminderEmailAddress);
		return $this;
	}
	public function getReminderEmailAddress () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ReminderEmailAddress", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createReminderEmailAddress () : \ascio\v3\ArrayOfstring {
		return $this->create ("ReminderEmailAddress", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setInvoiceEmailAddress (?\ascio\v3\ArrayOfstring $InvoiceEmailAddress = null) : self {
		$this->set("InvoiceEmailAddress", $InvoiceEmailAddress);
		return $this;
	}
	public function getInvoiceEmailAddress () : ?\ascio\v3\ArrayOfstring {
		return $this->get("InvoiceEmailAddress", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createInvoiceEmailAddress () : \ascio\v3\ArrayOfstring {
		return $this->create ("InvoiceEmailAddress", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setLastReminderSent (?\DateTime $LastReminderSent = null) : self {
		$this->set("LastReminderSent", $LastReminderSent);
		return $this;
	}
	public function getLastReminderSent () : ?\DateTime {
		return $this->get("LastReminderSent", "\\DateTime");
	}
	public function setNumberOfRemindersSent (?int $NumberOfRemindersSent = null) : self {
		$this->set("NumberOfRemindersSent", $NumberOfRemindersSent);
		return $this;
	}
	public function getNumberOfRemindersSent () : ?int {
		return $this->get("NumberOfRemindersSent", "int");
	}
	public function setLastBlockedAccountMessageSent (?\DateTime $LastBlockedAccountMessageSent = null) : self {
		$this->set("LastBlockedAccountMessageSent", $LastBlockedAccountMessageSent);
		return $this;
	}
	public function getLastBlockedAccountMessageSent () : ?\DateTime {
		return $this->get("LastBlockedAccountMessageSent", "\\DateTime");
	}
	public function setNumberOfBlockedAccountMessagesSent (?int $NumberOfBlockedAccountMessagesSent = null) : self {
		$this->set("NumberOfBlockedAccountMessagesSent", $NumberOfBlockedAccountMessagesSent);
		return $this;
	}
	public function getNumberOfBlockedAccountMessagesSent () : ?int {
		return $this->get("NumberOfBlockedAccountMessagesSent", "int");
	}
	public function setStandingAccountBalance (?float $StandingAccountBalance = null) : self {
		$this->set("StandingAccountBalance", $StandingAccountBalance);
		return $this;
	}
	public function getStandingAccountBalance () : ?float {
		return $this->get("StandingAccountBalance", "float");
	}
}