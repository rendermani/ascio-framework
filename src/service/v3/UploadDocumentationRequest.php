<?php

// XSLT-WSDL-Client. Generated PHP class of UploadDocumentationRequest

namespace ascio\service\v3;
use ascio\db\v3\UploadDocumentationRequestDb;
use ascio\api\v3\UploadDocumentationRequestApi;
use ascio\base\v3\DbBase;


class UploadDocumentationRequest extends DbBase  {

	protected $_apiProperties=["OrderId", "Documents"];
	protected $_apiObjects=["Documents"];
	protected $OrderId;
	protected $Documents;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadDocumentationRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadDocumentationRequestDb|null $db
	* @return UploadDocumentationRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setDocuments (?\ascio\v3\ArrayOfAttachment $Documents = null) : self {
		$this->set("Documents", $Documents);
		return $this;
	}
	public function getDocuments () : ?\ascio\v3\ArrayOfAttachment {
		return $this->get("Documents", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function createDocuments () : \ascio\v3\ArrayOfAttachment {
		return $this->create ("Documents", "\\ascio\\v3\\ArrayOfAttachment");
	}
}