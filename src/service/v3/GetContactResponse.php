<?php

// XSLT-WSDL-Client. Generated PHP class of GetContactResponse

namespace ascio\service\v3;
use ascio\db\v3\GetContactResponseDb;
use ascio\api\v3\GetContactResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetContactResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "ContactInfo"];
	protected $_apiObjects=["Errors", "ContactInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
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