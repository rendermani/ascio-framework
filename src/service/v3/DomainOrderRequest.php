<?php

// XSLT-WSDL-Client. Generated PHP class of DomainOrderRequest

namespace ascio\service\v3;
use ascio\db\v3\DomainOrderRequestDb;
use ascio\api\v3\DomainOrderRequestApi;
use ascio\v3\AbstractOrderRequest;
use ascio\api\v3\AbstractOrderRequestApi;


class DomainOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "Domain", "AgreedPrice"];
	protected $_apiObjects=["Domain"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $Domain;
	protected $AgreedPrice;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DomainOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param DomainOrderRequestDb|null $db
	* @return DomainOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setDomain (?\ascio\v3\Domain $Domain = null) : self {
		$this->set("Domain", $Domain);
		return $this;
	}
	public function getDomain () : ?\ascio\v3\Domain {
		return $this->get("Domain", "\\ascio\\v3\\Domain");
	}
	public function createDomain () : \ascio\v3\Domain {
		return $this->create ("Domain", "\\ascio\\v3\\Domain");
	}
	public function setAgreedPrice (?int $AgreedPrice = null) : self {
		$this->set("AgreedPrice", $AgreedPrice);
		return $this;
	}
	public function getAgreedPrice () : ?int {
		return $this->get("AgreedPrice", "int");
	}
}