<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfContactInfo

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfContactInfoDb;
use ascio\api\v3\ArrayOfContactInfoApi;


class ArrayOfContactInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["ContactInfo"];
	protected $_apiObjects=["ContactInfo"];
	protected $ContactInfo;

	public function setContactInfo (?Iterable $ContactInfo = null) : self {
		$this->set("ContactInfo", $ContactInfo);
		return $this;
	}
	public function getContactInfo () : ?Iterable {
		return $this->get("ContactInfo", "\\ascio\\v3\\ContactInfo");
	}
	public function createContactInfo () : \ascio\v3\ContactInfo {
		return $this->create ("ContactInfo", "\\ascio\\v3\\ContactInfo");
	}
	public function addContactInfo () : \ascio\v3\ContactInfo {
		return $this->add("ContactInfo","\\ascio\\v3\\ContactInfo",func_get_args());
	}
}