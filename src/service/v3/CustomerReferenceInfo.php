<?php

// XSLT-WSDL-Client. Generated PHP class of CustomerReferenceInfo

namespace ascio\service\v3;
use ascio\db\v3\CustomerReferenceInfoDb;
use ascio\api\v3\CustomerReferenceInfoApi;
use ascio\v3\CustomerReference;
use ascio\api\v3\CustomerReferenceApi;


class CustomerReferenceInfo extends CustomerReference  {

	protected $_apiProperties=["Handle", "ExternalId", "Description", "Extensions", "CreationDate", "Status"];
	protected $_apiObjects=["Extensions"];
	protected $Handle;
	protected $ExternalId;
	protected $Description;
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