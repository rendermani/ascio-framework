<?php

// XSLT-WSDL-Client. Generated PHP class of UploadMessageRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\UploadMessageRequestDb;
use ascio\api\v3\UploadMessageRequestApi;


abstract class UploadMessageRequest extends DbBase  {

	protected $_apiProperties=["OrderId", "Message"];
	protected $_apiObjects=["Message"];
	protected $OrderId;
	protected $Message;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new UploadMessageRequestDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param UploadMessageRequestDb|null $db
	* @return UploadMessageRequestDb
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
	public function setMessage (?\ascio\v3\Message $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?\ascio\v3\Message {
		return $this->get("Message", "\\ascio\\v3\\Message");
	}
	public function createMessage () : \ascio\v3\Message {
		return $this->create ("Message", "\\ascio\\v3\\Message");
	}
}