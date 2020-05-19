<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\GetRegistrantResponseDb;
use ascio\api\v2\GetRegistrantResponseApi;


class GetRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetRegistrantResult", "registrant"];
	protected $_apiObjects=["GetRegistrantResult", "registrant"];
	protected $GetRegistrantResult;
	protected $registrant;

	public function setGetRegistrantResult (?\ascio\v2\Response $GetRegistrantResult = null) : self {
		$this->set("GetRegistrantResult", $GetRegistrantResult);
		return $this;
	}
	public function getGetRegistrantResult () : ?\ascio\v2\Response {
		return $this->get("GetRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function createGetRegistrantResult () : \ascio\v2\Response {
		return $this->create ("GetRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function setRegistrant (?\ascio\v2\Registrant $registrant = null) : self {
		$this->set("registrant", $registrant);
		return $this;
	}
	public function getRegistrant () : ?\ascio\v2\Registrant {
		return $this->get("registrant", "\\ascio\\v2\\Registrant");
	}
	public function createRegistrant () : \ascio\v2\Registrant {
		return $this->create ("registrant", "\\ascio\\v2\\Registrant");
	}
}