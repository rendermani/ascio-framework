<?php

// XSLT-WSDL-Client. Generated PHP class of AccountTransaction

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AccountTransactionDb;
use ascio\api\v3\AccountTransactionApi;


class AccountTransaction extends DbBase  {

	protected $_apiProperties=["AccountTransactionType", "Created", "Amount", "Balance", "InvoiceNo", "CreditNo", "Note", "CreatedBy", "VatPercentage"];
	protected $_apiObjects=["Amount", "Balance", "VatPercentage"];
	protected $AccountTransactionType;
	protected $Created;
	protected $Amount;
	protected $Balance;
	protected $InvoiceNo;
	protected $CreditNo;
	protected $Note;
	protected $CreatedBy;
	protected $VatPercentage;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AccountTransactionDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new AccountTransactionApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return AccountTransactionApi
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
	* @param AccountTransactionDb|null $db
	* @return AccountTransactionDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAccountTransactionType (?string $AccountTransactionType = null) : self {
		$this->set("AccountTransactionType", $AccountTransactionType);
		return $this;
	}
	public function getAccountTransactionType () : ?string {
		return $this->get("AccountTransactionType", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setAmount (?\ascio\v3\double $Amount = null) : self {
		$this->set("Amount", $Amount);
		return $this;
	}
	public function getAmount () : ?\ascio\v3\double {
		return $this->get("Amount", "\\ascio\\v3\\double");
	}
	public function createAmount () : \ascio\v3\double {
		return $this->create ("Amount", "\\ascio\\v3\\double");
	}
	public function setBalance (?\ascio\v3\double $Balance = null) : self {
		$this->set("Balance", $Balance);
		return $this;
	}
	public function getBalance () : ?\ascio\v3\double {
		return $this->get("Balance", "\\ascio\\v3\\double");
	}
	public function createBalance () : \ascio\v3\double {
		return $this->create ("Balance", "\\ascio\\v3\\double");
	}
	public function setInvoiceNo (?int $InvoiceNo = null) : self {
		$this->set("InvoiceNo", $InvoiceNo);
		return $this;
	}
	public function getInvoiceNo () : ?int {
		return $this->get("InvoiceNo", "int");
	}
	public function setCreditNo (?int $CreditNo = null) : self {
		$this->set("CreditNo", $CreditNo);
		return $this;
	}
	public function getCreditNo () : ?int {
		return $this->get("CreditNo", "int");
	}
	public function setNote (?string $Note = null) : self {
		$this->set("Note", $Note);
		return $this;
	}
	public function getNote () : ?string {
		return $this->get("Note", "string");
	}
	public function setCreatedBy (?string $CreatedBy = null) : self {
		$this->set("CreatedBy", $CreatedBy);
		return $this;
	}
	public function getCreatedBy () : ?string {
		return $this->get("CreatedBy", "string");
	}
	public function setVatPercentage (?\ascio\v3\double $VatPercentage = null) : self {
		$this->set("VatPercentage", $VatPercentage);
		return $this;
	}
	public function getVatPercentage () : ?\ascio\v3\double {
		return $this->get("VatPercentage", "\\ascio\\v3\\double");
	}
	public function createVatPercentage () : \ascio\v3\double {
		return $this->create ("VatPercentage", "\\ascio\\v3\\double");
	}
}