<?php

// XSLT-WSDL-Client. Generated PHP class of DomainTradeMark

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\DomainTradeMarkDb;
use ascio\api\v3\DomainTradeMarkApi;


class DomainTradeMark extends DbBase  {

	protected $_apiProperties=["Name", "Country", "Date", "Number", "Type", "Contact", "ContactLanguage", "DocumentationLanguage", "SecondContact", "ThirdContact", "RegDate"];
	protected $_apiObjects=[];
	protected $Name;
	protected $Country;
	protected $Date;
	protected $Number;
	protected $Type;
	protected $Contact;
	protected $ContactLanguage;
	protected $DocumentationLanguage;
	protected $SecondContact;
	protected $ThirdContact;
	protected $RegDate;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DomainTradeMarkDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param DomainTradeMarkDb|null $db
	* @return DomainTradeMarkDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setName (?string $Name = null) : self {
		$this->set("Name", $Name);
		return $this;
	}
	public function getName () : ?string {
		return $this->get("Name", "string");
	}
	public function setCountry (?string $Country = null) : self {
		$this->set("Country", $Country);
		return $this;
	}
	public function getCountry () : ?string {
		return $this->get("Country", "string");
	}
	public function setDate (?\DateTime $Date = null) : self {
		$this->set("Date", $Date);
		return $this;
	}
	public function getDate () : ?\DateTime {
		return $this->get("Date", "\\DateTime");
	}
	public function setNumber (?string $Number = null) : self {
		$this->set("Number", $Number);
		return $this;
	}
	public function getNumber () : ?string {
		return $this->get("Number", "string");
	}
	public function setType (?string $Type = null) : self {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setContact (?string $Contact = null) : self {
		$this->set("Contact", $Contact);
		return $this;
	}
	public function getContact () : ?string {
		return $this->get("Contact", "string");
	}
	public function setContactLanguage (?string $ContactLanguage = null) : self {
		$this->set("ContactLanguage", $ContactLanguage);
		return $this;
	}
	public function getContactLanguage () : ?string {
		return $this->get("ContactLanguage", "string");
	}
	public function setDocumentationLanguage (?string $DocumentationLanguage = null) : self {
		$this->set("DocumentationLanguage", $DocumentationLanguage);
		return $this;
	}
	public function getDocumentationLanguage () : ?string {
		return $this->get("DocumentationLanguage", "string");
	}
	public function setSecondContact (?string $SecondContact = null) : self {
		$this->set("SecondContact", $SecondContact);
		return $this;
	}
	public function getSecondContact () : ?string {
		return $this->get("SecondContact", "string");
	}
	public function setThirdContact (?string $ThirdContact = null) : self {
		$this->set("ThirdContact", $ThirdContact);
		return $this;
	}
	public function getThirdContact () : ?string {
		return $this->get("ThirdContact", "string");
	}
	public function setRegDate (?\DateTime $RegDate = null) : self {
		$this->set("RegDate", $RegDate);
		return $this;
	}
	public function getRegDate () : ?\DateTime {
		return $this->get("RegDate", "\\DateTime");
	}
}