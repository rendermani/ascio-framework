<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfNameWatchInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfNameWatchInfoDb;
use ascio\api\v3\ArrayOfNameWatchInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfNameWatchInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["NameWatchInfo"];
	protected $_apiObjects=["NameWatchInfo"];
	protected $NameWatchInfo;

	public function setNameWatchInfo (?Iterable $NameWatchInfo = null) : self {
		$this->set("NameWatchInfo", $NameWatchInfo);
		return $this;
	}
	public function getNameWatchInfo () : ?Iterable {
		return $this->get("NameWatchInfo", "\\ascio\\v3\\NameWatchInfo");
	}
	public function createNameWatchInfo () : \ascio\v3\NameWatchInfo {
		return $this->create ("NameWatchInfo", "\\ascio\\v3\\NameWatchInfo");
	}
	public function addNameWatchInfo ($item = null) : \ascio\v3\NameWatchInfo {
		return $this->addItem("NameWatchInfo","\\ascio\\v3\\NameWatchInfo",func_get_args());
	}
}