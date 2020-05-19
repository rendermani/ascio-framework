<?php

// XSLT-WSDL-Client. Generated PHP class of QueueItem

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\QueueItemDb;
use ascio\api\v2\QueueItemApi;


class QueueItem extends DbBase  {

	protected $_apiProperties=["Attachments", "DomainHandle", "DomainName", "Msg", "MsgId", "MsgType", "OrderId", "OrderStatus", "StatusList"];
	protected $_apiObjects=["Attachments", "StatusList"];
	protected $Attachments;
	protected $DomainHandle;
	protected $DomainName;
	protected $Msg;
	protected $MsgId;
	protected $MsgType;
	protected $OrderId;
	protected $OrderStatus;
	protected $StatusList;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new QueueItemDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new QueueItemApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return QueueItemApi
	*/
	public function api($api = null) {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param QueueItemDb|null $db
	* @return QueueItemDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setAttachments (?\ascio\v2\ArrayOfAttachment $Attachments = null) : self {
		$this->set("Attachments", $Attachments);
		return $this;
	}
	public function getAttachments () : ?\ascio\v2\ArrayOfAttachment {
		return $this->get("Attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
	public function createAttachments () : \ascio\v2\ArrayOfAttachment {
		return $this->create ("Attachments", "\\ascio\\v2\\ArrayOfAttachment");
	}
	public function setDomainHandle (?string $DomainHandle = null) : self {
		$this->set("DomainHandle", $DomainHandle);
		return $this;
	}
	public function getDomainHandle () : ?string {
		return $this->get("DomainHandle", "string");
	}
	public function setDomainName (?string $DomainName = null) : self {
		$this->set("DomainName", $DomainName);
		return $this;
	}
	public function getDomainName () : ?string {
		return $this->get("DomainName", "string");
	}
	public function setMsg (?string $Msg = null) : self {
		$this->set("Msg", $Msg);
		return $this;
	}
	public function getMsg () : ?string {
		return $this->get("Msg", "string");
	}
	public function setMsgId (?int $MsgId = null) : self {
		$this->set("MsgId", $MsgId);
		return $this;
	}
	public function getMsgId () : ?int {
		return $this->get("MsgId", "int");
	}
	public function setMsgType (?string $MsgType = null) : self {
		$this->set("MsgType", $MsgType);
		return $this;
	}
	public function getMsgType () : ?string {
		return $this->get("MsgType", "string");
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
	public function setStatusList (?\ascio\v2\ArrayOfCallbackStatus $StatusList = null) : self {
		$this->set("StatusList", $StatusList);
		return $this;
	}
	public function getStatusList () : ?\ascio\v2\ArrayOfCallbackStatus {
		return $this->get("StatusList", "\\ascio\\v2\\ArrayOfCallbackStatus");
	}
	public function createStatusList () : \ascio\v2\ArrayOfCallbackStatus {
		return $this->create ("StatusList", "\\ascio\\v2\\ArrayOfCallbackStatus");
	}
}