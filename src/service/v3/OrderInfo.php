<?php

// XSLT-WSDL-Client. Generated PHP class of OrderInfo

namespace ascio\service\v3;
use ascio\db\v3\OrderInfoDb;
use ascio\api\v3\OrderInfoApi;
use ascio\base\v3\DbBase;


class OrderInfo extends DbBase  {

	protected $_apiProperties=["OrderId", "Status", "Created", "OrderRequest", "LastUpdated", "CreatedBy", "OrderStatusHistory"];
	protected $_apiObjects=["OrderRequest", "OrderStatusHistory"];
	protected $OrderId;
	protected $Status;
	protected $Created;
	protected $OrderRequest;
	protected $LastUpdated;
	protected $CreatedBy;
	protected $OrderStatusHistory;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new OrderInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new OrderInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return OrderInfoApi
	*/
	public function api($api = null) : ?\ascio\base\ApiModelBase {
		if(!$api) {
			return $this->_api;
		}
		$this->_api = $api;
		return $api;
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param OrderInfoDb|null $db
	* @return OrderInfoDb
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
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreated (?\DateTime $Created = null) : self {
		$this->set("Created", $Created);
		return $this;
	}
	public function getCreated () : ?\DateTime {
		return $this->get("Created", "\\DateTime");
	}
	public function setOrderRequest (?\ascio\v3\AbstractOrderRequest $OrderRequest = null) : self {
		$this->set("OrderRequest", $OrderRequest);
		return $this;
	}
	public function getOrderRequest () : ?\ascio\v3\AbstractOrderRequest {
		return $this->get("OrderRequest", "\\ascio\\v3\\AbstractOrderRequest");
	}
	public function createOrderRequest () : \ascio\v3\AbstractOrderRequest {
		return $this->create ("OrderRequest", "\\ascio\\v3\\AbstractOrderRequest");
	}
	public function setLastUpdated (?\DateTime $LastUpdated = null) : self {
		$this->set("LastUpdated", $LastUpdated);
		return $this;
	}
	public function getLastUpdated () : ?\DateTime {
		return $this->get("LastUpdated", "\\DateTime");
	}
	public function setCreatedBy (?string $CreatedBy = null) : self {
		$this->set("CreatedBy", $CreatedBy);
		return $this;
	}
	public function getCreatedBy () : ?string {
		return $this->get("CreatedBy", "string");
	}
	public function setOrderStatusHistory (?\ascio\v3\ArrayOfOrderHistory $OrderStatusHistory = null) : self {
		$this->set("OrderStatusHistory", $OrderStatusHistory);
		return $this;
	}
	public function getOrderStatusHistory () : ?\ascio\v3\ArrayOfOrderHistory {
		return $this->get("OrderStatusHistory", "\\ascio\\v3\\ArrayOfOrderHistory");
	}
	public function createOrderStatusHistory () : \ascio\v3\ArrayOfOrderHistory {
		return $this->create ("OrderStatusHistory", "\\ascio\\v3\\ArrayOfOrderHistory");
	}
}