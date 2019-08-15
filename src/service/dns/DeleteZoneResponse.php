<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteZoneResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\DeleteZoneResponseDb;
use ascio\api\dns\DeleteZoneResponseApi;


class DeleteZoneResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteZoneResult"];
	protected $_apiObjects=["DeleteZoneResult"];
	protected $DeleteZoneResult;

	public function setDeleteZoneResult (?\ascio\dns\Response $DeleteZoneResult = null) : self {
		$this->set("DeleteZoneResult", $DeleteZoneResult);
		return $this;
	}
	public function getDeleteZoneResult () : ?\ascio\dns\Response {
		return $this->get("DeleteZoneResult", "\\ascio\\dns\\Response");
	}
	public function createDeleteZoneResult () : \ascio\dns\Response {
		return $this->create ("DeleteZoneResult", "\\ascio\\dns\\Response");
	}
}