<?php

// XSLT-WSDL-Client. Generated PHP class of SetCustomerReferencesRequest

namespace ascio\service\v3;
use ascio\db\v3\SetCustomerReferencesRequestDb;
use ascio\api\v3\SetCustomerReferencesRequestApi;
use ascio\base\v3\Base;


class SetCustomerReferencesRequest extends Base  {

	protected $_apiProperties=["Handle", "ObjectHandles"];
	protected $_apiObjects=["ObjectHandles"];
	protected $Handle;
	protected $ObjectHandles;

	public function setHandle (?string $Handle = null) : self {
		$this->set("Handle", $Handle);
		return $this;
	}
	public function getHandle () : ?string {
		return $this->get("Handle", "string");
	}
	public function setObjectHandles (?\ascio\v3\ArrayOfstring $ObjectHandles = null) : self {
		$this->set("ObjectHandles", $ObjectHandles);
		return $this;
	}
	public function getObjectHandles () : ?\ascio\v3\ArrayOfstring {
		return $this->get("ObjectHandles", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createObjectHandles () : \ascio\v3\ArrayOfstring {
		return $this->create ("ObjectHandles", "\\ascio\\v3\\ArrayOfstring");
	}
}