<?php

// XSLT-WSDL-Client. Generated PHP class of DefensiveOrderRequest

namespace ascio\service\v3;
use ascio\db\v3\DefensiveOrderRequestDb;
use ascio\api\v3\DefensiveOrderRequestApi;
use ascio\v3\AbstractOrderRequest;
use ascio\api\v3\AbstractOrderRequestApi;


class DefensiveOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "Defensive", "AgreedPrice"];
	protected $_apiObjects=["Defensive"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $Defensive;
	protected $AgreedPrice;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DefensiveOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param DefensiveOrderRequestDb|null $db
	* @return DefensiveOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setDefensive (?\ascio\v3\Defensive $Defensive = null) : self {
		$this->set("Defensive", $Defensive);
		return $this;
	}
	public function getDefensive () : ?\ascio\v3\Defensive {
		return $this->get("Defensive", "\\ascio\\v3\\Defensive");
	}
	public function createDefensive () : \ascio\v3\Defensive {
		return $this->create ("Defensive", "\\ascio\\v3\\Defensive");
	}
	public function setAgreedPrice (?int $AgreedPrice = null) : self {
		$this->set("AgreedPrice", $AgreedPrice);
		return $this;
	}
	public function getAgreedPrice () : ?int {
		return $this->get("AgreedPrice", "int");
	}
}