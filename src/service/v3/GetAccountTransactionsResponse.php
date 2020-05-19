<?php

// XSLT-WSDL-Client. Generated PHP class of GetAccountTransactionsResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetAccountTransactionsResponseDb;
use ascio\api\v3\GetAccountTransactionsResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetAccountTransactionsResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "AccountTransactions", "Currency", "VatPercentage"];
	protected $_apiObjects=["Errors", "AccountTransactions", "VatPercentage"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $AccountTransactions;
	protected $Currency;
	protected $VatPercentage;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetAccountTransactionsResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetAccountTransactionsResponseDb|null $db
	* @return GetAccountTransactionsResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setAccountTransactions (?\ascio\v3\ArrayOfAccountTransactions $AccountTransactions = null) : self {
		$this->set("AccountTransactions", $AccountTransactions);
		return $this;
	}
	public function getAccountTransactions () : ?\ascio\v3\ArrayOfAccountTransactions {
		return $this->get("AccountTransactions", "\\ascio\\v3\\ArrayOfAccountTransactions");
	}
	public function createAccountTransactions () : \ascio\v3\ArrayOfAccountTransactions {
		return $this->create ("AccountTransactions", "\\ascio\\v3\\ArrayOfAccountTransactions");
	}
	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
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