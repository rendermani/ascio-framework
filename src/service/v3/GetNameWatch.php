<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameWatch

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetNameWatchDb;
use ascio\api\v3\GetNameWatchApi;


abstract class GetNameWatch extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetNameWatchDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetNameWatchDb|null $db
	* @return GetNameWatchDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\GetNameWatchRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\GetNameWatchRequest {
		return $this->get("request", "\\ascio\\v3\\GetNameWatchRequest");
	}
	public function createRequest () : \ascio\v3\GetNameWatchRequest {
		return $this->create ("request", "\\ascio\\v3\\GetNameWatchRequest");
	}
}