<?php

// XSLT-WSDL-Client. Generated PHP class of GetCreditNoteResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetCreditNoteResponseDb;
use ascio\api\v3\GetCreditNoteResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetCreditNoteResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "CreditNo", "Amount", "VatPercentage", "Created", "CreatedBy", "Note", "Currency", "SalesLineGroups"];
	protected $_apiObjects=["Errors", "SalesLineGroups"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $CreditNo;
	protected $Amount;
	protected $VatPercentage;
	protected $Created;
	protected $CreatedBy;
	protected $Note;
	protected $Currency;
	protected $SalesLineGroups;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetCreditNoteResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetCreditNoteResponseDb|null $db
	* @return GetCreditNoteResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setCreditNo (?int $CreditNo = null) : self {
		$this->set("CreditNo", $CreditNo);
		return $this;
	}
	public function getCreditNo () : ?int {
		return $this->get("CreditNo", "int");
	}
	public function setAmount (?float $Amount = null) : self {
		$this->set("Amount", $Amount);
		return $this;
	}
	public function getAmount () : ?float {
		return $this->get("Amount", "float");
	}
	public function setVatPercentage (?float $VatPercentage = null) : self {
		$this->set("VatPercentage", $VatPercentage);
		return $this;
	}
	public function getVatPercentage () : ?float {
		return $this->get("VatPercentage", "float");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setCreatedBy (?string $CreatedBy = null) : self {
		$this->set("CreatedBy", $CreatedBy);
		return $this;
	}
	public function getCreatedBy () : ?string {
		return $this->get("CreatedBy", "string");
	}
	public function setNote (?string $Note = null) : self {
		$this->set("Note", $Note);
		return $this;
	}
	public function getNote () : ?string {
		return $this->get("Note", "string");
	}
	public function setCurrency (?string $Currency = null) : self {
		$this->set("Currency", $Currency);
		return $this;
	}
	public function getCurrency () : ?string {
		return $this->get("Currency", "string");
	}
	public function setSalesLineGroups (?\ascio\v3\ArrayOfSalesLineGroups $SalesLineGroups = null) : self {
		$this->set("SalesLineGroups", $SalesLineGroups);
		return $this;
	}
	public function getSalesLineGroups () : ?\ascio\v3\ArrayOfSalesLineGroups {
		return $this->get("SalesLineGroups", "\\ascio\\v3\\ArrayOfSalesLineGroups");
	}
	public function createSalesLineGroups () : \ascio\v3\ArrayOfSalesLineGroups {
		return $this->create ("SalesLineGroups", "\\ascio\\v3\\ArrayOfSalesLineGroups");
	}
}