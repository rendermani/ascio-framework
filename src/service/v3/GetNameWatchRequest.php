<?php

// XSLT-WSDL-Client. Generated PHP class of GetNameWatchRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\GetNameWatchRequestDb;
use ascio\api\v3\GetNameWatchRequestApi;


class GetNameWatchRequest extends DbBase  {

	protected $_apiProperties=["Handle"];
	protected $_apiObjects=[];
	protected $Handle;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new GetNameWatchRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param GetNameWatchRequestDb|null $db
	* @return GetNameWatchRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : \ascio\v3\GetNameWatchRequest {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
}