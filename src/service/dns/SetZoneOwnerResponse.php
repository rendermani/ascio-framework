<?php

// XSLT-WSDL-Client. Generated PHP class of SetZoneOwnerResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\SetZoneOwnerResponseDb;
use ascio\api\dns\SetZoneOwnerResponseApi;


class SetZoneOwnerResponse extends ResponseRootElement  {

	protected $_apiProperties=["SetZoneOwnerResult"];
	protected $_apiObjects=["SetZoneOwnerResult"];
	protected $SetZoneOwnerResult;

	public function setSetZoneOwnerResult (?\ascio\dns\Response $SetZoneOwnerResult = null) : \ascio\dns\SetZoneOwnerResponse {
		$this->set("SetZoneOwnerResult", $SetZoneOwnerResult);
		return $this;
	}
	public function getSetZoneOwnerResult () : ?\ascio\dns\Response {
		return $this->get("SetZoneOwnerResult", "\\ascio\\dns\\Response");
	}
	public function createSetZoneOwnerResult () : \ascio\dns\Response {
		return $this->create ("SetZoneOwnerResult", "\\ascio\\dns\\Response");
	}
}