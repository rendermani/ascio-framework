<?php

// XSLT-WSDL-Client. Generated PHP class of Order

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\OrderDb;
use ascio\api\v2\OrderApi;


class Order extends DbBase  {

	protected $_apiProperties=["OrderId", "Type", "AccountReference", "Status", "TransactionComment", "Comments", "Options", "LocalPresence", "Batch", "Documentation", "Domain", "CreDate", "AgreedPrice"];
	protected $_apiObjects=["Domain"];
	protected $OrderId;
	protected $Type;
	protected $AccountReference;
	protected $Status;
	protected $TransactionComment;
	protected $Comments;
	protected $Options;
	protected $LocalPresence;
	protected $Batch;
	protected $Documentation;
	protected $Domain;
	protected $CreDate;
	protected $AgreedPrice;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new OrderDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new OrderApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return OrderApi
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
	* @param OrderDb|null $db
	* @return OrderDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setOrderId (?string $OrderId = null) : \ascio\v2\Order {
		$this->set("OrderId", $OrderId);
		return $this;
	}
	public function getOrderId () : ?string {
		return $this->get("OrderId", "string");
	}
	public function setType (?string $Type = null) : \ascio\v2\Order {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setAccountReference (?string $AccountReference = null) : \ascio\v2\Order {
		$this->set("AccountReference", $AccountReference);
		return $this;
	}
	public function getAccountReference () : ?string {
		return $this->get("AccountReference", "string");
	}
	public function setStatus (?string $Status = null) : \ascio\v2\Order {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setTransactionComment (?string $TransactionComment = null) : \ascio\v2\Order {
		$this->set("TransactionComment", $TransactionComment);
		return $this;
	}
	public function getTransactionComment () : ?string {
		return $this->get("TransactionComment", "string");
	}
	public function setComments (?string $Comments = null) : \ascio\v2\Order {
		$this->set("Comments", $Comments);
		return $this;
	}
	public function getComments () : ?string {
		return $this->get("Comments", "string");
	}
	public function setOptions (?string $Options = null) : \ascio\v2\Order {
		$this->set("Options", $Options);
		return $this;
	}
	public function getOptions () : ?string {
		return $this->get("Options", "string");
	}
	public function setLocalPresence (?string $LocalPresence = null) : \ascio\v2\Order {
		$this->set("LocalPresence", $LocalPresence);
		return $this;
	}
	public function getLocalPresence () : ?string {
		return $this->get("LocalPresence", "string");
	}
	public function setBatch (?string $Batch = null) : \ascio\v2\Order {
		$this->set("Batch", $Batch);
		return $this;
	}
	public function getBatch () : ?string {
		return $this->get("Batch", "string");
	}
	public function setDocumentation (?string $Documentation = null) : \ascio\v2\Order {
		$this->set("Documentation", $Documentation);
		return $this;
	}
	public function getDocumentation () : ?string {
		return $this->get("Documentation", "string");
	}
	public function setDomain (?\ascio\v2\Domain $Domain = null) : \ascio\v2\Order {
		$this->set("Domain", $Domain);
		return $this;
	}
	public function getDomain () : ?\ascio\v2\Domain {
		return $this->get("Domain", "\\ascio\\v2\\Domain");
	}
	public function createDomain () : \ascio\v2\Domain {
		return $this->create ("Domain", "\\ascio\\v2\\Domain");
	}
	public function setCreDate (?\DateTime $CreDate = null) : \ascio\v2\Order {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?\DateTime {
		return $this->get("CreDate", "\\DateTime");
	}
	public function setAgreedPrice (?int $AgreedPrice = null) : \ascio\v2\Order {
		$this->set("AgreedPrice", $AgreedPrice);
		return $this;
	}
	public function getAgreedPrice () : ?int {
		return $this->get("AgreedPrice", "int");
	}
}