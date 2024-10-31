<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRegistrantResponse

namespace ascio\service\v3;
use ascio\db\v3\DeleteRegistrantResponseDb;
use ascio\api\v3\DeleteRegistrantResponseApi;
use ascio\base\v3\ResponseRootElement;


class DeleteRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteRegistrantResult"];
	protected $_apiObjects=["DeleteRegistrantResult"];
	protected $DeleteRegistrantResult;

	public function setDeleteRegistrantResult (?\ascio\v3\DeleteHandleResponse $DeleteRegistrantResult = null) : self {
		$this->set("DeleteRegistrantResult", $DeleteRegistrantResult);
		return $this;
	}
	public function getDeleteRegistrantResult () : ?\ascio\v3\DeleteHandleResponse {
		return $this->get("DeleteRegistrantResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
	public function createDeleteRegistrantResult () : \ascio\v3\DeleteHandleResponse {
		return $this->create ("DeleteRegistrantResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
}