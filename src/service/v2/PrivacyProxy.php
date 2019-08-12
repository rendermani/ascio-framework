<?php

// XSLT-WSDL-Client. Generated PHP class of PrivacyProxy

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\PrivacyProxyDb;
use ascio\api\v2\PrivacyProxyApi;


class PrivacyProxy extends DbBase  {

	protected $_apiProperties=["Type", "PrivacyAdmin", "PrivacyTech", "PrivacyBilling", "Extensions"];
	protected $_apiObjects=["Extensions"];
	protected $Type;
	protected $PrivacyAdmin;
	protected $PrivacyTech;
	protected $PrivacyBilling;
	protected $Extensions;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new PrivacyProxyDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new PrivacyProxyApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return PrivacyProxyApi
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
	* @param PrivacyProxyDb|null $db
	* @return PrivacyProxyDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setType (?string $Type = null) : \ascio\v2\PrivacyProxy {
		$this->set("Type", $Type);
		return $this;
	}
	public function getType () : ?string {
		return $this->get("Type", "string");
	}
	public function setPrivacyAdmin (?bool $PrivacyAdmin = null) : \ascio\v2\PrivacyProxy {
		$this->set("PrivacyAdmin", $PrivacyAdmin);
		return $this;
	}
	public function getPrivacyAdmin () : ?bool {
		return $this->get("PrivacyAdmin", "bool");
	}
	public function setPrivacyTech (?bool $PrivacyTech = null) : \ascio\v2\PrivacyProxy {
		$this->set("PrivacyTech", $PrivacyTech);
		return $this;
	}
	public function getPrivacyTech () : ?bool {
		return $this->get("PrivacyTech", "bool");
	}
	public function setPrivacyBilling (?bool $PrivacyBilling = null) : \ascio\v2\PrivacyProxy {
		$this->set("PrivacyBilling", $PrivacyBilling);
		return $this;
	}
	public function getPrivacyBilling () : ?bool {
		return $this->get("PrivacyBilling", "bool");
	}
	public function setExtensions (?\ascio\v2\Extensions $Extensions = null) : \ascio\v2\PrivacyProxy {
		$this->set("Extensions", $Extensions);
		return $this;
	}
	public function getExtensions () : ?\ascio\v2\Extensions {
		return $this->get("Extensions", "\\ascio\\v2\\Extensions");
	}
	public function createExtensions () : \ascio\v2\Extensions {
		return $this->create ("Extensions", "\\ascio\\v2\\Extensions");
	}
}