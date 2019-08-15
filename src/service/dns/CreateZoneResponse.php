<?php

// XSLT-WSDL-Client. Generated PHP class of CreateZoneResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\CreateZoneResponseDb;
use ascio\api\dns\CreateZoneResponseApi;


class CreateZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateZoneResult"];
	protected $_apiObjects=["CreateZoneResult"];
	protected $CreateZoneResult;

	public function setCreateZoneResult (?\ascio\dns\Response $CreateZoneResult = null) : self {
		$this->set("CreateZoneResult", $CreateZoneResult);
		return $this;
	}
	public function getCreateZoneResult () : ?\ascio\dns\Response {
		return $this->get("CreateZoneResult", "\\ascio\\dns\\Response");
	}
	public function createCreateZoneResult () : \ascio\dns\Response {
		return $this->create ("CreateZoneResult", "\\ascio\\dns\\Response");
	}
}