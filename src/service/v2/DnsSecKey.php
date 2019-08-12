<?php

// XSLT-WSDL-Client. Generated PHP class of DnsSecKey

namespace ascio\service\v2;
use ascio\base\v2\DbBase;
use ascio\db\v2\DnsSecKeyDb;
use ascio\api\v2\DnsSecKeyApi;


class DnsSecKey extends DbBase  {

	protected $_apiProperties=["Handle", "Status", "DigestAlgorithm", "DigestType", "Digest", "Protocol", "KeyType", "KeyAlgorithm", "KeyTag", "PublicKey", "CreDate"];
	protected $_apiObjects=[];
	protected $Handle;
	protected $Status;
	protected $DigestAlgorithm;
	protected $DigestType;
	protected $Digest;
	protected $Protocol;
	protected $KeyType;
	protected $KeyAlgorithm;
	protected $KeyTag;
	protected $PublicKey;
	protected $CreDate;

	public function __construct($parent = null) {
		parent::__construct($parent);

		//set the database model
		$db = new DnsSecKeyDb();
		$db->parent($this);
		$this->db($db);

		//set the api model
		$api = new DnsSecKeyApi($this);
		$api->parent($this);
		$api->config($this->config()->v2);
		$this->api($api);
	}
	/**
	* Provides API-Specific methods like update,create,delete.
	* @param @name|null $api
	* @return DnsSecKeyApi
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
	* @param DnsSecKeyDb|null $db
	* @return DnsSecKeyDb
	*/
	public function db($db = null) {
		if(!$db) {
			return $this->_db;
		}
		$this->_db = $db;
		$this->_db->parent($this);
		return $db;
	}
	public function setHandle (?string $Handle = null) : \ascio\v2\DnsSecKey {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setStatus (?string $Status = null) : \ascio\v2\DnsSecKey {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setDigestAlgorithm (?string $DigestAlgorithm = null) : \ascio\v2\DnsSecKey {
		$this->set("DigestAlgorithm", $DigestAlgorithm);
		return $this;
	}
	public function getDigestAlgorithm () : ?string {
		return $this->get("DigestAlgorithm", "string");
	}
	public function setDigestType (?string $DigestType = null) : \ascio\v2\DnsSecKey {
		$this->set("DigestType", $DigestType);
		return $this;
	}
	public function getDigestType () : ?string {
		return $this->get("DigestType", "string");
	}
	public function setDigest (?string $Digest = null) : \ascio\v2\DnsSecKey {
		$this->set("Digest", $Digest);
		return $this;
	}
	public function getDigest () : ?string {
		return $this->get("Digest", "string");
	}
	public function setProtocol (?string $Protocol = null) : \ascio\v2\DnsSecKey {
		$this->set("Protocol", $Protocol);
		return $this;
	}
	public function getProtocol () : ?string {
		return $this->get("Protocol", "string");
	}
	public function setKeyType (?string $KeyType = null) : \ascio\v2\DnsSecKey {
		$this->set("KeyType", $KeyType);
		return $this;
	}
	public function getKeyType () : ?string {
		return $this->get("KeyType", "string");
	}
	public function setKeyAlgorithm (?string $KeyAlgorithm = null) : \ascio\v2\DnsSecKey {
		$this->set("KeyAlgorithm", $KeyAlgorithm);
		return $this;
	}
	public function getKeyAlgorithm () : ?string {
		return $this->get("KeyAlgorithm", "string");
	}
	public function setKeyTag (?string $KeyTag = null) : \ascio\v2\DnsSecKey {
		$this->set("KeyTag", $KeyTag);
		return $this;
	}
	public function getKeyTag () : ?string {
		return $this->get("KeyTag", "string");
	}
	public function setPublicKey (?string $PublicKey = null) : \ascio\v2\DnsSecKey {
		$this->set("PublicKey", $PublicKey);
		return $this;
	}
	public function getPublicKey () : ?string {
		return $this->get("PublicKey", "string");
	}
	public function setCreDate (?string $CreDate = null) : \ascio\v2\DnsSecKey {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?string {
		return $this->get("CreDate", "string");
	}
}