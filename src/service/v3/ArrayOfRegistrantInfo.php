<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfRegistrantInfo

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfRegistrantInfoDb;
use ascio\api\v3\ArrayOfRegistrantInfoApi;


class ArrayOfRegistrantInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["RegistrantInfo"];
	protected $_apiObjects=["RegistrantInfo"];
	protected $RegistrantInfo;

	public function setRegistrantInfo (?Iterable $RegistrantInfo = null) : self {
		$this->set("RegistrantInfo", $RegistrantInfo);
		return $this;
	}
	public function getRegistrantInfo () : ?Iterable {
		return $this->get("RegistrantInfo", "\\ascio\\v3\\RegistrantInfo");
	}
	public function createRegistrantInfo () : \ascio\v3\RegistrantInfo {
		return $this->create ("RegistrantInfo", "\\ascio\\v3\\RegistrantInfo");
	}
	public function addRegistrantInfo () : \ascio\v3\RegistrantInfo {
		return $this->add("RegistrantInfo","\\ascio\\v3\\RegistrantInfo",func_get_args());
	}
}