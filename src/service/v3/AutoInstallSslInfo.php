<?php

// XSLT-WSDL-Client. Generated PHP class of AutoInstallSslInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\AutoInstallSslInfoDb;
use ascio\api\v3\AutoInstallSslInfoApi;


abstract class AutoInstallSslInfo extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "Created", "CommonName", "ProductCode", "Email", "SanCount", "Token", "ObjectComment"];
	protected $_apiObjects=[];
	protected $Handle;
	protected $Status;
	protected $Created;
	protected $CommonName;
	protected $ProductCode;
	protected $Email;
	protected $SanCount;
	protected $Token;
	protected $ObjectComment;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new AutoInstallSslInfoDb();
		$db->parent($this);
		$this->db($db);
	}
	/**
	* Provides DB-Specific methods like update,create,delete.
	* @param AutoInstallSslInfoDb|null $db
	* @return AutoInstallSslInfoDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	/**
	* Getters and setters for API-Properties
	*/
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
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
	public function setToken (?string $Token = null) : self {
		$this->set("Token", $Token);
		return $this;
	}
	public function getToken () : ?string {
		return $this->get("Token", "string");
	}
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
}