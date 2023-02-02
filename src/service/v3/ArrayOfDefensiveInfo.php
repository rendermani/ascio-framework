<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfDefensiveInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfDefensiveInfoDb;
use ascio\api\v3\ArrayOfDefensiveInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfDefensiveInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["DefensiveInfo"];
	protected $_apiObjects=["DefensiveInfo"];
	protected $DefensiveInfo;

	public function setDefensiveInfo (?Iterable $DefensiveInfo = null) : self {
		$this->set("DefensiveInfo", $DefensiveInfo);
		return $this;
	}
	public function getDefensiveInfo () : ?Iterable {
		return $this->get("DefensiveInfo", "\\ascio\\v3\\DefensiveInfo");
	}
	public function createDefensiveInfo () : \ascio\v3\DefensiveInfo {
		return $this->create ("DefensiveInfo", "\\ascio\\v3\\DefensiveInfo");
	}
	public function addDefensiveInfo ($item = null) : \ascio\v3\DefensiveInfo {
		return $this->addItem("DefensiveInfo","\\ascio\\v3\\DefensiveInfo",func_get_args());
	}
}