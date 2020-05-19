<?php

// XSLT-WSDL-Client. Generated PHP class of UploadDocumentationResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\UploadDocumentationResponseDb;
use ascio\api\v3\UploadDocumentationResponseApi;
use ascio\api\v3\AbstractResponseApi;


class UploadDocumentationResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors"];
	protected $_apiObjects=["Errors"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadDocumentationResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadDocumentationResponseDb|null $db
	* @return UploadDocumentationResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
}