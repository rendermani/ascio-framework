<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfMarkInfo

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfMarkInfoDb;
use ascio\api\v3\ArrayOfMarkInfoApi;


class ArrayOfMarkInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["MarkInfo"];
	protected $_apiObjects=["MarkInfo"];
	protected $MarkInfo;

	public function setMarkInfo (?Iterable $MarkInfo = null) : self {
		$this->set("MarkInfo", $MarkInfo);
		return $this;
	}
	public function getMarkInfo () : ?Iterable {
		return $this->get("MarkInfo", "\\ascio\\v3\\MarkInfo");
	}
	public function createMarkInfo () : \ascio\v3\MarkInfo {
		return $this->create ("MarkInfo", "\\ascio\\v3\\MarkInfo");
	}
	public function addMarkInfo () : \ascio\v3\MarkInfo {
		return $this->add("MarkInfo","\\ascio\\v3\\MarkInfo",func_get_args());
	}
}