<?php

// XSLT-WSDL-Client. Generated PHP class of QueueMessage

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\QueueMessageDb;
use ascio\api\v3\QueueMessageApi;


abstract class QueueMessage extends DbBase  {

	protected $_apiProperties=["Attachments", "ErrorCodes", "Id", "Message", "MessageType", "ObjectHandle", "ObjectName", "ObjectType", "OrderId", "OrderStatus", "OrderType"];
	protected $_apiObjects=["Attachments", "ErrorCodes"];
	protected $Attachments;
	protected $ErrorCodes;
	protected $Id;
	protected $Message;
	protected $MessageType;
	protected $ObjectHandle;
	protected $ObjectName;
	protected $ObjectType;
	protected $OrderId;
	protected $OrderStatus;
	protected $OrderType;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new QueueMessageDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param QueueMessageDb|null $db
	* @return QueueMessageDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAttachments (?\ascio\v3\ArrayOfAttachment $Attachments = null) : self {
		$this->set("Attachments", $Attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v3\ArrayOfAttachment {
		return $this->get("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v3\ArrayOfAttachment {
		return $this->create ("Attachments", "\\ascio\\v3\\ArrayOfAttachment");
	}
	public function setErrorCodes (?\ascio\v3\ArrayOfErrorCode $ErrorCodes = null) : self {
		$this->set("ErrorCodes", $ErrorCodes);
		return $this;
	}
	public function getErrorCodes () : ?\ascio\v3\ArrayOfErrorCode {
		return $this->get("ErrorCodes", "\\ascio\\v3\\ArrayOfErrorCode");
	}
	public function createErrorCodes () : \ascio\v3\ArrayOfErrorCode {
		return $this->create ("ErrorCodes", "\\ascio\\v3\\ArrayOfErrorCode");
	}
	public function setId (?int $Id = null) : self {
		$this->set("Id", $Id);
		return $this;
	}
	public function getId () : ?int {
		return $this->get("Id", "int");
	}
	public function setMessage (?string $Message = null) : self {
		$this->set("Message", $Message);
		return $this;
	}
	public function getMessage () : ?string {
		return $this->get("Message", "string");
	}
	public function setMessageType (?string $MessageType = null) : self {
		$this->set("MessageType", $MessageType);
		return $this;
	}
	public function getMessageType () : ?string {
		return $this->get("MessageType", "string");
	}
	public function setObjectHandle (?string $ObjectHandle = null) : self {
		$this->set("ObjectHandle", $ObjectHandle);
		return $this;
	}
	public function getObjectHandle () : ?string {
		return $this->get("ObjectHandle", "string");
	}
	public function setObjectName (?string $ObjectName = null) : self {
		$this->set("ObjectName", $ObjectName);
		return $this;
	}
	public function getObjectName () : ?string {
		return $this->get("ObjectName", "string");
	}
	public function setObjectType (?string $ObjectType = null) : self {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?string {
		return $this->get("ObjectType", "string");
	}
	public function setOrderId (?string $OrderId = null) : self {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setOrderStatus (?string $OrderStatus = null) : self {
		$this->set("OrderStatus", $OrderStatus);
		return $this;
	}
	public function getOrderStatus () : ?string {
		return $this->get("OrderStatus", "string");
	}
	public function setOrderType (?string $OrderType = null) : self {
		$this->set("OrderType", $OrderType);
		return $this;
	}
	public function getOrderType () : ?string {
		return $this->get("OrderType", "string");
	}
}