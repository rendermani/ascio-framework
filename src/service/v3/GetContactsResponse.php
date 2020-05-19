<?php

// XSLT-WSDL-Client. Generated PHP class of GetContactsResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\GetContactsResponseDb;
use ascio\api\v3\GetContactsResponseApi;
use ascio\api\v3\AbstractResponseApi;


class GetContactsResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "TotalCount", "ContactInfos"];
	protected $_apiObjects=["Errors", "ContactInfos"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $TotalCount;
	protected $ContactInfos;

	public function setTotalCount (?int $TotalCount = null) : self {
		$this->set("TotalCount", $TotalCount);
		return $this;
	}
	public function getTotalCount () : ?int {
		return $this->get("TotalCount", "int");
	}
	public function setContactInfos (?\ascio\v3\ArrayOfContactInfo $ContactInfos = null) : self {
		$this->set("ContactInfos", $ContactInfos);
		return $this;
	}
	public function getContactInfos () : ?\ascio\v3\ArrayOfContactInfo {
		return $this->get("ContactInfos", "\\ascio\\v3\\ArrayOfContactInfo");
	}
	public function createContactInfos () : \ascio\v3\ArrayOfContactInfo {
		return $this->create ("ContactInfos", "\\ascio\\v3\\ArrayOfContactInfo");
	}
}