<?php

// XSLT-WSDL-Client. Generated PHP class of MarkInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\MarkInfoDb;
use ascio\api\v3\MarkInfoApi;


abstract class MarkInfo extends DbBase  {

	protected $_apiProperties=["Status", "Created", "Expires", "Mark", "Smd"];
	protected $_apiObjects=["Mark"];
	protected $Status;
	protected $Created;
	protected $Expires;
	protected $Mark;
	protected $Smd;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new MarkInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new MarkInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return MarkInfoApi
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
	* @param MarkInfoDb|null $db
	* @return MarkInfoDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
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
	public function setExpires (?\DateTime $Expires = null) : self {
		$this->set("Expires", $Expires);
		return $this;
	}
	public function getExpires () : ?\DateTime {
		return $this->get("Expires", "\\DateTime");
	}
	public function setMark (?\ascio\v3\AbstractMark $Mark = null) : self {
		$this->set("Mark", $Mark);
		return $this;
	}
	public function getMark () : ?\ascio\v3\AbstractMark {
		return $this->get("Mark", "\\ascio\\v3\\AbstractMark");
	}
	public function createMark () : \ascio\v3\AbstractMark {
		return $this->create ("Mark", "\\ascio\\v3\\AbstractMark");
	}
	public function setSmd (?string $Smd = null) : self {
		$this->set("Smd", $Smd);
		return $this;
	}
	public function getSmd () : ?string {
		return $this->get("Smd", "string");
	}
}