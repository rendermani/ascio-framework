<?php

// XSLT-WSDL-Client. Generated PHP class of RegistrantInfo

namespace ascio\service\v3;
use ascio\db\v3\RegistrantInfoDb;
use ascio\api\v3\RegistrantInfoApi;
use ascio\v3\Registrant;
use ascio\api\v3\RegistrantApi;


class RegistrantInfo extends Registrant  {

	protected $_apiProperties=["Handle", "FirstName", "LastName", "OrgName", "Address1", "Address2", "City", "State", "PostalCode", "CountryCode", "Phone", "Fax", "Email", "Type", "Details", "OrganisationNumber", "Extensions", "VatNumber", "NexusCategory", "RegistrantDate", "CreationDate", "Status"];
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
	protected $VatNumber;
	protected $NexusCategory;
	protected $RegistrantDate;
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