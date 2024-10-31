<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteNameServerResponse

namespace ascio\service\v3;
use ascio\db\v3\DeleteNameServerResponseDb;
use ascio\api\v3\DeleteNameServerResponseApi;
use ascio\base\v3\ResponseRootElement;


class DeleteNameServerResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteNameServerResult"];
	protected $_apiObjects=["DeleteNameServerResult"];
	protected $DeleteNameServerResult;

	public function setDeleteNameServerResult (?\ascio\v3\DeleteHandleResponse $DeleteNameServerResult = null) : self {
		$this->set("DeleteNameServerResult", $DeleteNameServerResult);
		return $this;
	}
	public function getDeleteNameServerResult () : ?\ascio\v3\DeleteHandleResponse {
		return $this->get("DeleteNameServerResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
	public function createDeleteNameServerResult () : \ascio\v3\DeleteHandleResponse {
		return $this->create ("DeleteNameServerResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
}