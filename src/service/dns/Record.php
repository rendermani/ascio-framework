<?php

// XSLT-WSDL-Client. Generated PHP class of Record

namespace ascio\service\dns;
use ascio\db\dns\RecordDb;
use ascio\api\dns\RecordApi;
use ascio\base\dns\DbBase;


class Record extends DbBase  {

	protected $_apiProperties=["Id", "Serial", "Source", "TTL", "Target"];
	protected $_apiObjects=[];
	protected $_substitutions = [
		["name" => "WebForward","type" => "\\ascio\\dns\\WebForward"], 
		["name" => "SRV","type" => "\\ascio\\dns\\SRV"], 
		["name" => "CNAME","type" => "\\ascio\\dns\\CNAME"], 
		["name" => "SOA","type" => "\\ascio\\dns\\SOA"], 
		["name" => "TXT","type" => "\\ascio\\dns\\TXT"], 
		["name" => "PTR","type" => "\\ascio\\dns\\PTR"], 
		["name" => "MX","type" => "\\ascio\\dns\\MX"], 
		["name" => "A","type" => "\\ascio\\dns\\A"], 
		["name" => "AAAA","type" => "\\ascio\\dns\\AAAA"], 
		["name" => "CAA","type" => "\\ascio\\dns\\CAA"], 
		["name" => "NS","type" => "\\ascio\\dns\\NS"], 
		["name" => "MailForward","type" => "\\ascio\\dns\\MailForward"] 
	];

	protected $Id;
	protected $Serial;
	protected $Source;
	protected $TTL;
	protected $Target;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new RecordDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new RecordApi($this);
		$api->parent($this);
		$api->config($this->config()->dns);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return RecordApi
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
	* @param RecordDb|null $db
	* @return RecordDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setId (?int $Id = null) : self {
		$this->set("Id", $Id);
		return $this;
	}
	public function getId () : ?int {
		return $this->get("Id", "int");
	}
	public function setSerial (?int $Serial = null) : self {
		$this->set("Serial", $Serial);
		return $this;
	}
	public function getSerial () : ?int {
		return $this->get("Serial", "int");
	}
	public function setSource (?string $Source = null) : self {
		$this->set("Source", $Source);
		return $this;
	}
	public function getSource () : ?string {
		return $this->get("Source", "string");
	}
	public function setTTL (?int $TTL = null) : self {
		$this->set("TTL", $TTL);
		return $this;
	}
	public function getTTL () : ?int {
		return $this->get("TTL", "int");
	}
	public function setTarget (?string $Target = null) : self {
		$this->set("Target", $Target);
		return $this;
	}
	public function getTarget () : ?string {
		return $this->get("Target", "string");
	}
}