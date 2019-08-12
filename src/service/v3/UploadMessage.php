<?php

// XSLT-WSDL-Client. Generated PHP class of UploadMessage

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\UploadMessageDb;
use ascio\api\v3\UploadMessageApi;


class UploadMessage extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadMessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadMessageDb|null $db
	* @return UploadMessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setRequest (?\ascio\v3\UploadMessageRequest $request = null) : \ascio\v3\UploadMessage {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\UploadMessageRequest {
		return $this->get("request", "\\ascio\\v3\\UploadMessageRequest");
	}
	public function createRequest () : \ascio\v3\UploadMessageRequest {
		return $this->create ("request", "\\ascio\\v3\\UploadMessageRequest");
	}
}