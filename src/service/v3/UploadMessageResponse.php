<?php

// XSLT-WSDL-Client. Generated PHP class of UploadMessageResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\UploadMessageResponseDb;
use ascio\api\v3\UploadMessageResponseApi;
use ascio\api\v3\AbstractResponseApi;


class UploadMessageResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "MessageId"];
	protected $_apiObjects=["Errors"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $MessageId;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadMessageResponseDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadMessageResponseDb|null $db
	* @return UploadMessageResponseDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setMessageId (?int $MessageId = null) : self {
		$this->set("MessageId", $MessageId);
		return $this;
	}
	public function getMessageId () : ?int {
		return $this->get("MessageId", "int");
	}
}