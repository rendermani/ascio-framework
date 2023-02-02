<?php

// XSLT-WSDL-Client. Generated PHP class of ObjectInfo

namespace ascio\service\v3;
use ascio\db\v3\ObjectInfoDb;
use ascio\api\v3\ObjectInfoApi;
use ascio\base\v3\Base;


class ObjectInfo extends Base  {

	protected $_apiProperties=["Handle", "ObjectName", "ObjectType", "Status", "Created", "Expires"];
	protected $_apiObjects=[];
	protected $Handle;
	protected $ObjectName;
	protected $ObjectType;
	protected $Status;
	protected $Created;
	protected $Expires;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setObjectName (?string $ObjectName = null) : self {
		$this->set("ObjectName", $ObjectName);
		return $this;
	}
	public function getObjectName () : ?string {
		return $this->get("ObjectName", "string");
	}
	public function setObjectType (?string $ObjectType = null) : self {
		$this->set("ObjectType", $ObjectType);
		return $this;
	}
	public function getObjectType () : ?string {
		return $this->get("ObjectType", "string");
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
}