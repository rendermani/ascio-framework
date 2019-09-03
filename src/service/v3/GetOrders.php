<?php

// XSLT-WSDL-Client. Generated PHP class of GetOrders

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetOrdersDb;
use ascio\api\v3\GetOrdersApi;


abstract class GetOrders extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetOrdersDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetOrdersDb|null $db
	* @return GetOrdersDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\GetOrdersRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetOrdersRequest {
		return $this->get("request", "\\ascio\\v3\\GetOrdersRequest");
	}
	public function createRequest () : \ascio\v3\GetOrdersRequest {
		return $this->create ("request", "\\ascio\\v3\\GetOrdersRequest");
	}
}