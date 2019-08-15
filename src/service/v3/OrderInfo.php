<?php

// XSLT-WSDL-Client. Generated PHP class of OrderInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\OrderInfoDb;
use ascio\api\v3\OrderInfoApi;


class OrderInfo extends DbBase  {

	protected $_apiProperties=["OrderId", "Status", "Created", "OrderRequest"];
	protected $_apiObjects=["OrderRequest"];
	protected $OrderId;
	protected $Status;
	protected $Created;
	protected $OrderRequest;

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
	public function api($api = null) {
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
}