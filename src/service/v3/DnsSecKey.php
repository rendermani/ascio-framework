<?php

// XSLT-WSDL-Client. Generated PHP class of DnsSecKey

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\DnsSecKeyDb;
use ascio\api\v3\DnsSecKeyApi;


class DnsSecKey extends Base  {

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
	public function setDigestAlgorithm (?string $DigestAlgorithm = null) : self {
		$this->set("DigestAlgorithm", $DigestAlgorithm);
		return $this;
	}
	public function getDigestAlgorithm () : ?string {
		return $this->get("DigestAlgorithm", "string");
	}
	public function setDigestType (?string $DigestType = null) : self {
		$this->set("DigestType", $DigestType);
		return $this;
	}
	public function getDigestType () : ?string {
		return $this->get("DigestType", "string");
	}
	public function setDigest (?string $Digest = null) : self {
		$this->set("Digest", $Digest);
		return $this;
	}
	public function getDigest () : ?string {
		return $this->get("Digest", "string");
	}
	public function setProtocol (?string $Protocol = null) : self {
		$this->set("Protocol", $Protocol);
		return $this;
	}
	public function getProtocol () : ?string {
		return $this->get("Protocol", "string");
	}
	public function setKeyType (?string $KeyType = null) : self {
		$this->set("KeyType", $KeyType);
		return $this;
	}
	public function getKeyType () : ?string {
		return $this->get("KeyType", "string");
	}
	public function setKeyAlgorithm (?string $KeyAlgorithm = null) : self {
		$this->set("KeyAlgorithm", $KeyAlgorithm);
		return $this;
	}
	public function getKeyAlgorithm () : ?string {
		return $this->get("KeyAlgorithm", "string");
	}
	public function setKeyTag (?string $KeyTag = null) : self {
		$this->set("KeyTag", $KeyTag);
		return $this;
	}
	public function getKeyTag () : ?string {
		return $this->get("KeyTag", "string");
	}
	public function setPublicKey (?string $PublicKey = null) : self {
		$this->set("PublicKey", $PublicKey);
		return $this;
	}
	public function getPublicKey () : ?string {
		return $this->get("PublicKey", "string");
	}
	public function setCreDate (?string $CreDate = null) : self {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?string {
		return $this->get("CreDate", "string");
	}
}