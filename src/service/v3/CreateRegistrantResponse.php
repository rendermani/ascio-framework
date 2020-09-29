<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRegistrantResponse

namespace ascio\service\v3;
use ascio\db\v3\CreateRegistrantResponseDb;
use ascio\api\v3\CreateRegistrantResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class CreateRegistrantResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "Registrant"];
	protected $_apiObjects=["Errors", "Registrant"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $Registrant;

	public function setRegistrant (?\ascio\v3\Registrant $Registrant = null) : self {
		$this->set("Registrant", $Registrant);
		return $this;
	}
	public function getRegistrant () : ?\ascio\v3\Registrant {
		return $this->get("Registrant", "\\ascio\\v3\\Registrant");
	}
	public function createRegistrant () : \ascio\v3\Registrant {
		return $this->create ("Registrant", "\\ascio\\v3\\Registrant");
	}
}