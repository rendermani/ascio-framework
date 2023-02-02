<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSlaveZoneResponse

namespace ascio\service\dns;
use ascio\db\dns\CreateSlaveZoneResponseDb;
use ascio\api\dns\CreateSlaveZoneResponseApi;
use ascio\base\dns\ResponseRootElement;


class CreateSlaveZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateSlaveZoneResult"];
	protected $_apiObjects=["CreateSlaveZoneResult"];
	protected $CreateSlaveZoneResult;

	public function setCreateSlaveZoneResult (?\ascio\dns\Response $CreateSlaveZoneResult = null) : self {
		$this->set("CreateSlaveZoneResult", $CreateSlaveZoneResult);
		return $this;
	}
	public function getCreateSlaveZoneResult () : ?\ascio\dns\Response {
		return $this->get("CreateSlaveZoneResult", "\\ascio\\dns\\Response");
	}
	public function createCreateSlaveZoneResult () : \ascio\dns\Response {
		return $this->create ("CreateSlaveZoneResult", "\\ascio\\dns\\Response");
	}
}