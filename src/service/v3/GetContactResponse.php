<?php

// XSLT-WSDL-Client. Generated PHP class of GetContactResponse

namespace ascio\service\v3;
use ascio\base\v3\ResponseRootElement;
use ascio\db\v3\GetContactResponseDb;
use ascio\api\v3\GetContactResponseApi;


class GetContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["ContactInfo"];
	protected $_apiObjects=["ContactInfo"];
	protected $ContactInfo;

	public function setContactInfo (?\ascio\v3\ContactInfo $ContactInfo = null) : self {
		$this->set("ContactInfo", $ContactInfo);
		return $this;
	}
	public function getContactInfo () : ?\ascio\v3\ContactInfo {
		return $this->get("ContactInfo", "\\ascio\\v3\\ContactInfo");
	}
	public function createContactInfo () : \ascio\v3\ContactInfo {
		return $this->create ("ContactInfo", "\\ascio\\v3\\ContactInfo");
	}
}