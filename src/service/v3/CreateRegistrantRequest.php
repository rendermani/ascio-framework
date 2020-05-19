<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRegistrantRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\CreateRegistrantRequestDb;
use ascio\api\v3\CreateRegistrantRequestApi;


class CreateRegistrantRequest extends Base  {

	protected $_apiProperties=["Registrant"];
	protected $_apiObjects=["Registrant"];
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