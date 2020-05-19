<?php

// XSLT-WSDL-Client. Generated PHP class of AutoInstallSsl

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AutoInstallSslDb;
use ascio\api\v3\AutoInstallSslApi;


class AutoInstallSsl extends DbBase  {

	protected $_apiProperties=["Handle", "CommonName", "ProductCode", "Email", "SanCount", "ObjectComment"];
	protected $_apiObjects=[];
	protected $Handle;
	protected $CommonName;
	protected $ProductCode;
	protected $Email;
	protected $SanCount;
	protected $ObjectComment;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AutoInstallSslDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new AutoInstallSslApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return AutoInstallSslApi
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
	* @param AutoInstallSslDb|null $db
	* @return AutoInstallSslDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setCommonName (?string $CommonName = null) : self {
		$this->set("CommonName", $CommonName);
		return $this;
	}
	public function getCommonName () : ?string {
		return $this->get("CommonName", "string");
	}
	public function setProductCode (?string $ProductCode = null) : self {
		$this->set("ProductCode", $ProductCode);
		return $this;
	}
	public function getProductCode () : ?string {
		return $this->get("ProductCode", "string");
	}
	public function setEmail (?string $Email = null) : self {
		$this->set("Email", $Email);
		return $this;
	}
	public function getEmail () : ?string {
		return $this->get("Email", "string");
	}
	public function setSanCount (?int $SanCount = null) : self {
		$this->set("SanCount", $SanCount);
		return $this;
	}
	public function getSanCount () : ?int {
		return $this->get("SanCount", "int");
	}
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
}