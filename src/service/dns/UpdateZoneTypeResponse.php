<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateZoneTypeResponse

namespace ascio\service\dns;
use ascio\db\dns\UpdateZoneTypeResponseDb;
use ascio\api\dns\UpdateZoneTypeResponseApi;
use ascio\base\dns\ResponseRootElement;


class UpdateZoneTypeResponse extends ResponseRootElement  {

	protected $_apiProperties=["UpdateZoneTypeResult"];
	protected $_apiObjects=["UpdateZoneTypeResult"];
	protected $UpdateZoneTypeResult;

	public function setUpdateZoneTypeResult (?\ascio\dns\Response $UpdateZoneTypeResult = null) : self {
		$this->set("UpdateZoneTypeResult", $UpdateZoneTypeResult);
		return $this;
	}
	public function getUpdateZoneTypeResult () : ?\ascio\dns\Response {
		return $this->get("UpdateZoneTypeResult", "\\ascio\\dns\\Response");
	}
	public function createUpdateZoneTypeResult () : \ascio\dns\Response {
		return $this->create ("UpdateZoneTypeResult", "\\ascio\\dns\\Response");
	}
}