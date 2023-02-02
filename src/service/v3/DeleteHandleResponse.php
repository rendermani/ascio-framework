<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteHandleResponse

namespace ascio\service\v3;
use ascio\db\v3\DeleteHandleResponseDb;
use ascio\api\v3\DeleteHandleResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class DeleteHandleResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "ObjectsUsingHandle"];
	protected $_apiObjects=["Errors", "ObjectsUsingHandle"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $ObjectsUsingHandle;

	public function setObjectsUsingHandle (?\ascio\v3\ArrayOfObjectInfo $ObjectsUsingHandle = null) : self {
		$this->set("ObjectsUsingHandle", $ObjectsUsingHandle);
		return $this;
	}
	public function getObjectsUsingHandle () : ?\ascio\v3\ArrayOfObjectInfo {
		return $this->get("ObjectsUsingHandle", "\\ascio\\v3\\ArrayOfObjectInfo");
	}
	public function createObjectsUsingHandle () : \ascio\v3\ArrayOfObjectInfo {
		return $this->create ("ObjectsUsingHandle", "\\ascio\\v3\\ArrayOfObjectInfo");
	}
}