<?php

// XSLT-WSDL-Client. Generated PHP class of AbstractOrderRequest

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AbstractOrderRequestDb;
use ascio\api\v3\AbstractOrderRequestApi;


class AbstractOrderRequest extends DbBase  {

	protected $_apiProperties=["Type", "Period", "TransactionComment", "Comments", "Documentation", "Options"];
	protected $_apiObjects=[];
	protected $_substitutions = [
		["name" => "MarkOrderRequest","type" => "\\ascio\\v3\\MarkOrderRequest"], 
		["name" => "AutoInstallSslOrderRequest","type" => "\\ascio\\v3\\AutoInstallSslOrderRequest"], 
		["name" => "SslCertificateOrderRequest","type" => "\\ascio\\v3\\SslCertificateOrderRequest"], 
		["name" => "NameWatchOrderRequest","type" => "\\ascio\\v3\\NameWatchOrderRequest"], 
		["name" => "DefensiveOrderRequest","type" => "\\ascio\\v3\\DefensiveOrderRequest"] 
	];

	protected $Type;
	protected $Period;
	protected $TransactionComment;
	protected $Comments;
	protected $Documentation;
	protected $Options;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AbstractOrderRequestDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new AbstractOrderRequestApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return AbstractOrderRequestApi
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
	* @param AbstractOrderRequestDb|null $db
	* @return AbstractOrderRequestDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setType (?string $Type = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setPeriod (?int $Period = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("Period", $Period);
		return $this;
	}
	public function getPeriod () : ?int {
		return $this->get("Period", "int");
	}
	public function setTransactionComment (?string $TransactionComment = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("TransactionComment", $TransactionComment);
		return $this;
	}
	public function getTransactionComment () : ?string {
		return $this->get("TransactionComment", "string");
	}
	public function setComments (?string $Comments = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("Comments", $Comments);
		return $this;
	}
	public function getComments () : ?string {
		return $this->get("Comments", "string");
	}
	public function setDocumentation (?string $Documentation = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("Documentation", $Documentation);
		return $this;
	}
	public function getDocumentation () : ?string {
		return $this->get("Documentation", "string");
	}
	public function setOptions (?string $Options = null) : \ascio\v3\AbstractOrderRequest {
		$this->set("Options", $Options);
		return $this;
	}
	public function getOptions () : ?string {
		return $this->get("Options", "string");
	}
}