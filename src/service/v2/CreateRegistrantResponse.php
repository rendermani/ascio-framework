<?php

// XSLT-WSDL-Client. Generated PHP class of CreateRegistrantResponse

namespace ascio\service\v2;
use ascio\db\v2\CreateRegistrantResponseDb;
use ascio\api\v2\CreateRegistrantResponseApi;
use ascio\base\v2\ResponseRootElement;


class CreateRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateRegistrantResult", "registrant"];
	protected $_apiObjects=["CreateRegistrantResult", "registrant"];
	protected $CreateRegistrantResult;
	protected $registrant;

	public function setCreateRegistrantResult (?\ascio\v2\Response $CreateRegistrantResult = null) : self {
		$this->set("CreateRegistrantResult", $CreateRegistrantResult);
		return $this;
	}
	public function getCreateRegistrantResult () : ?\ascio\v2\Response {
		return $this->get("CreateRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function createCreateRegistrantResult () : \ascio\v2\Response {
		return $this->create ("CreateRegistrantResult", "\\ascio\\v2\\Response");
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