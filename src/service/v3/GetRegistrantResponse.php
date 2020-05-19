<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantResponse

namespace ascio\service\v3;
use ascio\base\v3\ResponseRootElement;
use ascio\db\v3\GetRegistrantResponseDb;
use ascio\api\v3\GetRegistrantResponseApi;


class GetRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["RegistrantInfo"];
	protected $_apiObjects=["RegistrantInfo"];
	protected $RegistrantInfo;

	public function setRegistrantInfo (?\ascio\v3\RegistrantInfo $RegistrantInfo = null) : self {
		$this->set("RegistrantInfo", $RegistrantInfo);
		return $this;
	}
	public function getRegistrantInfo () : ?\ascio\v3\RegistrantInfo {
		return $this->get("RegistrantInfo", "\\ascio\\v3\\RegistrantInfo");
	}
	public function createRegistrantInfo () : \ascio\v3\RegistrantInfo {
		return $this->create ("RegistrantInfo", "\\ascio\\v3\\RegistrantInfo");
	}
}