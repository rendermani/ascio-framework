<?php

// XSLT-WSDL-Client. Generated PHP class of NameWatchOrderRequest

namespace ascio\service\v3;
use ascio\v3\AbstractOrderRequest;
use ascio\db\v3\NameWatchOrderRequestDb;
use ascio\api\v3\NameWatchOrderRequestApi;
use ascio\api\v3\AbstractOrderRequestApi;


abstract class NameWatchOrderRequest extends AbstractOrderRequest  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options", "NameWatch"];
	protected $_apiObjects=["NameWatch"];
	protected $_substituted = true;
	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;
	protected $NameWatch;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new NameWatchOrderRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param NameWatchOrderRequestDb|null $db
	* @return NameWatchOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setNameWatch (?\ascio\v3\NameWatch $NameWatch = null) : self {
		$this->set("NameWatch", $NameWatch);
		return $this;
	}
	public function getNameWatch () : ?\ascio\v3\NameWatch {
		return $this->get("NameWatch", "\\ascio\\v3\\NameWatch");
	}
	public function createNameWatch () : \ascio\v3\NameWatch {
		return $this->create ("NameWatch", "\\ascio\\v3\\NameWatch");
	}
}