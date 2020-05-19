<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountBalanceResponse

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetAccountBalanceResponseDb;
use ascio\api\v3\GetAccountBalanceResponseApi;


class GetAccountBalanceResponse extends DbBase  {

	protected $_apiProperties=["Currency", "Vat", "UnInvoicedOrders", "UnInvoicedOpenOrders", "UnInvoicedCompletedOrders", "UnInvoicedCompletedOrdersLast24h", "AccountBalance", "CurrentBalance", "ReminderThreshold", "BlockingThreshold", "ReminderEmailAddress", "InvoiceEmailAddress", "LastReminderSent", "NumberOfRemindersSent", "LastBlockedAccountMessageSent", "NumberOfBlockedAccountMessagesSent"];
	protected $_apiObjects=["Vat", "UnInvoicedOrders", "UnInvoicedOpenOrders", "UnInvoicedCompletedOrders", "UnInvoicedCompletedOrdersLast24h", "AccountBalance", "CurrentBalance", "ReminderThreshold", "BlockingThreshold", "ReminderEmailAddress", "InvoiceEmailAddress"];
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
	public function setVat (?\ascio\v3\double $Vat = null) : self {
		$this->set("Vat", $Vat);
		return $this;
	}
	public function getVat () : ?\ascio\v3\double {
		return $this->get("Vat", "\\ascio\\v3\\double");
	}
	public function createVat () : \ascio\v3\double {
		return $this->create ("Vat", "\\ascio\\v3\\double");
	}
	public function setUnInvoicedOrders (?\ascio\v3\double $UnInvoicedOrders = null) : self {
		$this->set("UnInvoicedOrders", $UnInvoicedOrders);
		return $this;
	}
	public function getUnInvoicedOrders () : ?\ascio\v3\double {
		return $this->get("UnInvoicedOrders", "\\ascio\\v3\\double");
	}
	public function createUnInvoicedOrders () : \ascio\v3\double {
		return $this->create ("UnInvoicedOrders", "\\ascio\\v3\\double");
	}
	public function setUnInvoicedOpenOrders (?\ascio\v3\double $UnInvoicedOpenOrders = null) : self {
		$this->set("UnInvoicedOpenOrders", $UnInvoicedOpenOrders);
		return $this;
	}
	public function getUnInvoicedOpenOrders () : ?\ascio\v3\double {
		return $this->get("UnInvoicedOpenOrders", "\\ascio\\v3\\double");
	}
	public function createUnInvoicedOpenOrders () : \ascio\v3\double {
		return $this->create ("UnInvoicedOpenOrders", "\\ascio\\v3\\double");
	}
	public function setUnInvoicedCompletedOrders (?\ascio\v3\double $UnInvoicedCompletedOrders = null) : self {
		$this->set("UnInvoicedCompletedOrders", $UnInvoicedCompletedOrders);
		return $this;
	}
	public function getUnInvoicedCompletedOrders () : ?\ascio\v3\double {
		return $this->get("UnInvoicedCompletedOrders", "\\ascio\\v3\\double");
	}
	public function createUnInvoicedCompletedOrders () : \ascio\v3\double {
		return $this->create ("UnInvoicedCompletedOrders", "\\ascio\\v3\\double");
	}
	public function setUnInvoicedCompletedOrdersLast24h (?\ascio\v3\double $UnInvoicedCompletedOrdersLast24h = null) : self {
		$this->set("UnInvoicedCompletedOrdersLast24h", $UnInvoicedCompletedOrdersLast24h);
		return $this;
	}
	public function getUnInvoicedCompletedOrdersLast24h () : ?\ascio\v3\double {
		return $this->get("UnInvoicedCompletedOrdersLast24h", "\\ascio\\v3\\double");
	}
	public function createUnInvoicedCompletedOrdersLast24h () : \ascio\v3\double {
		return $this->create ("UnInvoicedCompletedOrdersLast24h", "\\ascio\\v3\\double");
	}
	public function setAccountBalance (?\ascio\v3\double $AccountBalance = null) : self {
		$this->set("AccountBalance", $AccountBalance);
		return $this;
	}
	public function getAccountBalance () : ?\ascio\v3\double {
		return $this->get("AccountBalance", "\\ascio\\v3\\double");
	}
	public function createAccountBalance () : \ascio\v3\double {
		return $this->create ("AccountBalance", "\\ascio\\v3\\double");
	}
	public function setCurrentBalance (?\ascio\v3\double $CurrentBalance = null) : self {
		$this->set("CurrentBalance", $CurrentBalance);
		return $this;
	}
	public function getCurrentBalance () : ?\ascio\v3\double {
		return $this->get("CurrentBalance", "\\ascio\\v3\\double");
	}
	public function createCurrentBalance () : \ascio\v3\double {
		return $this->create ("CurrentBalance", "\\ascio\\v3\\double");
	}
	public function setReminderThreshold (?\ascio\v3\double $ReminderThreshold = null) : self {
		$this->set("ReminderThreshold", $ReminderThreshold);
		return $this;
	}
	public function getReminderThreshold () : ?\ascio\v3\double {
		return $this->get("ReminderThreshold", "\\ascio\\v3\\double");
	}
	public function createReminderThreshold () : \ascio\v3\double {
		return $this->create ("ReminderThreshold", "\\ascio\\v3\\double");
	}
	public function setBlockingThreshold (?\ascio\v3\double $BlockingThreshold = null) : self {
		$this->set("BlockingThreshold", $BlockingThreshold);
		return $this;
	}
	public function getBlockingThreshold () : ?\ascio\v3\double {
		return $this->get("BlockingThreshold", "\\ascio\\v3\\double");
	}
	public function createBlockingThreshold () : \ascio\v3\double {
		return $this->create ("BlockingThreshold", "\\ascio\\v3\\double");
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
}