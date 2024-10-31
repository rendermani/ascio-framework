<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteDnsSecKeyResponse

namespace ascio\service\v3;
use ascio\db\v3\DeleteDnsSecKeyResponseDb;
use ascio\api\v3\DeleteDnsSecKeyResponseApi;
use ascio\base\v3\ResponseRootElement;


class DeleteDnsSecKeyResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteDnsSecKeyResult"];
	protected $_apiObjects=["DeleteDnsSecKeyResult"];
	protected $DeleteDnsSecKeyResult;

	public function setDeleteDnsSecKeyResult (?\ascio\v3\DeleteHandleResponse $DeleteDnsSecKeyResult = null) : self {
		$this->set("DeleteDnsSecKeyResult", $DeleteDnsSecKeyResult);
		return $this;
	}
	public function getDeleteDnsSecKeyResult () : ?\ascio\v3\DeleteHandleResponse {
		return $this->get("DeleteDnsSecKeyResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
	public function createDeleteDnsSecKeyResult () : \ascio\v3\DeleteHandleResponse {
		return $this->create ("DeleteDnsSecKeyResult", "\\ascio\\v3\\DeleteHandleResponse");
	}
}