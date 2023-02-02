<?php

// XSLT-WSDL-Client. Generated PHP class of CustomerReference

namespace ascio\service\v3;
use ascio\db\v3\CustomerReferenceDb;
use ascio\api\v3\CustomerReferenceApi;
use ascio\base\v3\Base;


class CustomerReference extends Base  {

	protected $_apiProperties=["Handle", "ExternalId", "Description", "Extensions"];
	protected $_apiObjects=["Extensions"];
	protected $_substitutions = [
		["name" => "CustomerReferenceInfo","type" => "\\ascio\\v3\\CustomerReferenceInfo"] 
	];

	protected $Handle;
	protected $ExternalId;
	protected $Description;
	protected $Extensions;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setExternalId (?string $ExternalId = null) : self {
		$this->set("ExternalId", $ExternalId);
		return $this;
	}
	public function getExternalId () : ?string {
		return $this->get("ExternalId", "string");
	}
	public function setDescription (?string $Description = null) : self {
		$this->set("Description", $Description);
		return $this;
	}
	public function getDescription () : ?string {
		return $this->get("Description", "string");
	}
	public function setExtensions (?\ascio\v3\Extensions $Extensions = null) : self {
		$this->set("Extensions", $Extensions);
		return $this;
	}
	public function getExtensions () : ?\ascio\v3\Extensions {
		return $this->get("Extensions", "\\ascio\\v3\\Extensions");
	}
	public function createExtensions () : \ascio\v3\Extensions {
		return $this->create ("Extensions", "\\ascio\\v3\\Extensions");
	}
}