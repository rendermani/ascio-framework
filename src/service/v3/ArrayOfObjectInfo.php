<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfObjectInfo

namespace ascio\service\v3;
use ascio\db\v3\ArrayOfObjectInfoDb;
use ascio\api\v3\ArrayOfObjectInfoApi;
use ascio\base\v3\ArrayBase;


class ArrayOfObjectInfo extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["ObjectsUsingHandle"];
	protected $_apiObjects=["ObjectsUsingHandle"];
	protected $ObjectsUsingHandle;

	public function setObjectsUsingHandle (?Iterable $ObjectsUsingHandle = null) : self {
		$this->set("ObjectsUsingHandle", $ObjectsUsingHandle);
		return $this;
	}
	public function getObjectsUsingHandle () : ?Iterable {
		return $this->get("ObjectsUsingHandle", "\\ascio\\v3\\ObjectInfo");
	}
	public function createObjectsUsingHandle () : \ascio\v3\ObjectInfo {
		return $this->create ("ObjectsUsingHandle", "\\ascio\\v3\\ObjectInfo");
	}
	public function addObjectsUsingHandle ($item = null) : \ascio\v3\ObjectInfo {
		return $this->addItem("ObjectsUsingHandle","\\ascio\\v3\\ObjectInfo",func_get_args());
	}
}