<?php

// XSLT-WSDL-Client. Generated PHP class of GetRegistrantResponse

namespace ascio\service\v3;
use ascio\db\v3\GetRegistrantResponseDb;
use ascio\api\v3\GetRegistrantResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetRegistrantResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "RegistrantInfo"];
	protected $_apiObjects=["Errors", "RegistrantInfo"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
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