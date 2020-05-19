<?php

// XSLT-WSDL-Client. Generated PHP class of NameServer

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\NameServerDb;
use ascio\api\v3\NameServerApi;


class NameServer extends Base  {

	protected $_apiProperties=["CreDate", "Handle", "HostName", "IpAddress", "Status", "IpV6Address", "Details"];
	protected $_apiObjects=[];
	protected $CreDate;
	protected $Handle;
	protected $HostName;
	protected $IpAddress;
	protected $Status;
	protected $IpV6Address;
	protected $Details;

	public function setCreDate (?\DateTime $CreDate = null) : self {
		$this->set("CreDate", $CreDate);
		return $this;
	}
	public function getCreDate () : ?\DateTime {
		return $this->get("CreDate", "\\DateTime");
	}
	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setHostName (?string $HostName = null) : self {
		$this->set("HostName", $HostName);
		return $this;
	}
	public function getHostName () : ?string {
		return $this->get("HostName", "string");
	}
	public function setIpAddress (?string $IpAddress = null) : self {
		$this->set("IpAddress", $IpAddress);
		return $this;
	}
	public function getIpAddress () : ?string {
		return $this->get("IpAddress", "string");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
	public function setIpV6Address (?string $IpV6Address = null) : self {
		$this->set("IpV6Address", $IpV6Address);
		return $this;
	}
	public function getIpV6Address () : ?string {
		return $this->get("IpV6Address", "string");
	}
	public function setDetails (?string $Details = null) : self {
		$this->set("Details", $Details);
		return $this;
	}
	public function getDetails () : ?string {
		return $this->get("Details", "string");
	}
}