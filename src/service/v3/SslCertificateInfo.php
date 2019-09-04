<?php

// XSLT-WSDL-Client. Generated PHP class of SslCertificateInfo

namespace ascio\service\v3;
use ascio\base\v3\DbBase;
use ascio\db\v3\SslCertificateInfoDb;
use ascio\api\v3\SslCertificateInfoApi;


abstract class SslCertificateInfo extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "Created", "Expires", "CommonName", "ProductCode", "WebServerType", "ApproverEmail", "CSR", "Certificate", "Owner", "Admin", "Tech", "SanNames", "ObjectComment", "ValidationType", "SslProductName"];
	protected $_apiObjects=["Owner", "Admin", "Tech", "SanNames"];
	protected $Handle;
	protected $Status;
	protected $Created;
	protected $Expires;
	protected $CommonName;
	protected $ProductCode;
	protected $WebServerType;
	protected $ApproverEmail;
	protected $CSR;
	protected $Certificate;
	protected $Owner;
	protected $Admin;
	protected $Tech;
	protected $SanNames;
	protected $ObjectComment;
	protected $ValidationType;
	protected $SslProductName;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new SslCertificateInfoDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new SslCertificateInfoApi($this);
		$api->parent($this);
		$api->config($this->config()->v3);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return SslCertificateInfoApi
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
	* @param SslCertificateInfoDb|null $db
	* @return SslCertificateInfoDb
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
	public function setExpires (?\DateTime $Expires = null) : self {
		$this->set("Expires", $Expires);
		return $this;
	}
	public function getExpires () : ?\DateTime {
		return $this->get("Expires", "\\DateTime");
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
	public function setWebServerType (?string $WebServerType = null) : self {
		$this->set("WebServerType", $WebServerType);
		return $this;
	}
	public function getWebServerType () : ?string {
		return $this->get("WebServerType", "string");
	}
	public function setApproverEmail (?string $ApproverEmail = null) : self {
		$this->set("ApproverEmail", $ApproverEmail);
		return $this;
	}
	public function getApproverEmail () : ?string {
		return $this->get("ApproverEmail", "string");
	}
	public function setCSR (?string $CSR = null) : self {
		$this->set("CSR", $CSR);
		return $this;
	}
	public function getCSR () : ?string {
		return $this->get("CSR", "string");
	}
	public function setCertificate (?string $Certificate = null) : self {
		$this->set("Certificate", $Certificate);
		return $this;
	}
	public function getCertificate () : ?string {
		return $this->get("Certificate", "string");
	}
	public function setOwner (?\ascio\v3\Registrant $Owner = null) : self {
		$this->set("Owner", $Owner);
		return $this;
	}
	public function getOwner () : ?\ascio\v3\Registrant {
		return $this->get("Owner", "\\ascio\\v3\\Registrant");
	}
	public function createOwner () : \ascio\v3\Registrant {
		return $this->create ("Owner", "\\ascio\\v3\\Registrant");
	}
	public function setAdmin (?\ascio\v3\Contact $Admin = null) : self {
		$this->set("Admin", $Admin);
		return $this;
	}
	public function getAdmin () : ?\ascio\v3\Contact {
		return $this->get("Admin", "\\ascio\\v3\\Contact");
	}
	public function createAdmin () : \ascio\v3\Contact {
		return $this->create ("Admin", "\\ascio\\v3\\Contact");
	}
	public function setTech (?\ascio\v3\Contact $Tech = null) : self {
		$this->set("Tech", $Tech);
		return $this;
	}
	public function getTech () : ?\ascio\v3\Contact {
		return $this->get("Tech", "\\ascio\\v3\\Contact");
	}
	public function createTech () : \ascio\v3\Contact {
		return $this->create ("Tech", "\\ascio\\v3\\Contact");
	}
	public function setSanNames (?\ascio\v3\ArrayOfstring $SanNames = null) : self {
		$this->set("SanNames", $SanNames);
		return $this;
	}
	public function getSanNames () : ?\ascio\v3\ArrayOfstring {
		return $this->get("SanNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createSanNames () : \ascio\v3\ArrayOfstring {
		return $this->create ("SanNames", "\\ascio\\v3\\ArrayOfstring");
	}
	public function setObjectComment (?string $ObjectComment = null) : self {
		$this->set("ObjectComment", $ObjectComment);
		return $this;
	}
	public function getObjectComment () : ?string {
		return $this->get("ObjectComment", "string");
	}
	public function setValidationType (?string $ValidationType = null) : self {
		$this->set("ValidationType", $ValidationType);
		return $this;
	}
	public function getValidationType () : ?string {
		return $this->get("ValidationType", "string");
	}
	public function setSslProductName (?string $SslProductName = null) : self {
		$this->set("SslProductName", $SslProductName);
		return $this;
	}
	public function getSslProductName () : ?string {
		return $this->get("SslProductName", "string");
	}
}