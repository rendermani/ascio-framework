<?php

// XSLT-WSDL-Client. Generated PHP class of ValidateOrder

namespace ascio\service\v3;
use ascio\db\v3\ValidateOrderDb;
use ascio\api\v3\ValidateOrderApi;
use ascio\base\v3\DbBase;


class ValidateOrder extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new ValidateOrderDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param ValidateOrderDb|null $db
	* @return ValidateOrderDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\AbstractOrderRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\AbstractOrderRequest {
		return $this->get("request", "\\ascio\\v3\\AbstractOrderRequest");
	}
	public function createRequest () : \ascio\v3\AbstractOrderRequest {
		return $this->create ("request", "\\ascio\\v3\\AbstractOrderRequest");
	}
}