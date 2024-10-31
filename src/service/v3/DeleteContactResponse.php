<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteContactResponse

namespace ascio\service\v3;
use ascio\db\v3\DeleteContactResponseDb;
use ascio\api\v3\DeleteContactResponseApi;
use ascio\base\v3\ResponseRootElement;


class DeleteContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteContactResult"];
	protected $_apiObjects=["DeleteContactResult"];
	protected $DeleteContactResult;

	public function setDeleteContactResult (?\ascio\v3\DeleteHandleResponse $DeleteContactResult = null) : self {
		$this->set("DeleteContactResult", $DeleteContactResult);
		return $this;
	}
	public function getDeleteContactResult () : ?\ascio\v3\DeleteHandleResponse {
		return $this->get("DeleteContactResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
	public function createDeleteContactResult () : \ascio\v3\DeleteHandleResponse {
		return $this->create ("DeleteContactResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
}