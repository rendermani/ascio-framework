<?php

// XSLT-WSDL-Client. Generated PHP class of ContactInfo

namespace ascio\service\v3;
use ascio\db\v3\ContactInfoDb;
use ascio\api\v3\ContactInfoApi;
use ascio\v3\Contact;
use ascio\api\v3\ContactApi;


class ContactInfo extends Contact  {

	protected $_apiProperties=["Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Type", "Details", "OrganisationNumber", "Extensions", "CreationDate", "Status"];
	protected $_apiObjects=["Extensions"];
	protected $Handle;
	protected $FirstName;
	protected $LastName;
	protected $OrgName;
	protected $Address1;
	protected $Address2;
	protected $City;
	protected $State;
	protected $PostalCode;
	protected $CountryCode;
	protected $Phone;
	protected $Fax;
	protected $Email;
	protected $Type;
	protected $Details;
	protected $OrganisationNumber;
	protected $Extensions;
	protected $CreationDate;
	protected $Status;

	public function setCreationDate (?\DateTime $CreationDate = null) : self {
		$this->set("CreationDate", $CreationDate);
		return $this;
	}
	public function getCreationDate () : ?\DateTime {
		return $this->get("CreationDate", "\\DateTime");
	}
	public function setStatus (?string $Status = null) : self {
		$this->set("Status", $Status);
		return $this;
	}
	public function getStatus () : ?string {
		return $this->get("Status", "string");
	}
}