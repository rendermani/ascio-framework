<?php

// XSLT-WSDL-Client. Generated PHP class of UploadDocumentation

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\UploadDocumentationDb;
use ascio\api\v3\UploadDocumentationApi;


abstract class UploadDocumentation extends DbBase  {

	protected $_apiProperties=["request"];
	protected $_apiObjects=["request"];
	protected $request;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadDocumentationDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadDocumentationDb|null $db
	* @return UploadDocumentationDb
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
	public function setRequest (?\ascio\v3\UploadDocumentationRequest $request = null) : self {
		$this->set("request", $request);
		return $this;
	}
	public function getRequest () : ?\ascio\v3\UploadDocumentationRequest {
		return $this->get("request", "\\ascio\\v3\\UploadDocumentationRequest");
	}
	public function createRequest () : \ascio\v3\UploadDocumentationRequest {
		return $this->create ("request", "\\ascio\\v3\\UploadDocumentationRequest");
	}
}