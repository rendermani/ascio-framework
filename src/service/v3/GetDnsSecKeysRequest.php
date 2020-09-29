<?php

// XSLT-WSDL-Client. Generated PHP class of GetDnsSecKeysRequest

namespace ascio\service\v3;
use ascio\db\v3\GetDnsSecKeysRequestDb;
use ascio\api\v3\GetDnsSecKeysRequestApi;
use ascio\base\v3\Base;


class GetDnsSecKeysRequest extends Base  {

	protected $_apiProperties=["Handle", "DigestAlgorithm", "DigestType", "Digest", "Protocol", "KeyType", "KeyAlgorithm", "KeyTag", "PublicKey", "Status", "CreationFromDate", "CreationToDate", "OrderSort", "PageInfo"];
	protected $_apiObjects=["PageInfo"];
	protected $Handle;
	protected $DigestAlgorithm;
	protected $DigestType;
	protected $Digest;
	protected $Protocol;
	protected $KeyType;
	protected $KeyAlgorithm;
	protected $KeyTag;
	protected $PublicKey;
	protected $Status;
	protected $CreationFromDate;
	protected $CreationToDate;
	protected $OrderSort;
	protected $PageInfo;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
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
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setCreationFromDate (?\DateTime $CreationFromDate = null) : self {
		$this->set("CreationFromDate", $CreationFromDate);
		return $this;
	}
	public function getCreationFromDate () : ?\DateTime {
		return $this->get("CreationFromDate", "\\DateTime");
	}
	public function setCreationToDate (?\DateTime $CreationToDate = null) : self {
		$this->set("CreationToDate", $CreationToDate);
		return $this;
	}
	public function getCreationToDate () : ?\DateTime {
		return $this->get("CreationToDate", "\\DateTime");
	}
	public function setOrderSort (?string $OrderSort = null) : self {
		$this->set("OrderSort", $OrderSort);
		return $this;
	}
	public function getOrderSort () : ?string {
		return $this->get("OrderSort", "string");
	}
	public function setPageInfo (?\ascio\v3\PagingInfo $PageInfo = null) : self {
		$this->set("PageInfo", $PageInfo);
		return $this;
	}
	public function getPageInfo () : ?\ascio\v3\PagingInfo {
		return $this->get("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
	public function createPageInfo () : \ascio\v3\PagingInfo {
		return $this->create ("PageInfo", "\\ascio\\v3\\PagingInfo");
	}
}