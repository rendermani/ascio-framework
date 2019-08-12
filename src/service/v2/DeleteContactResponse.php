<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteContactResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\DeleteContactResponseDb;
use ascio\api\v2\DeleteContactResponseApi;


class DeleteContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteContactResult"];
	protected $_apiObjects=["DeleteContactResult"];
	protected $DeleteContactResult;

	public function setDeleteContactResult (?\ascio\v2\Response $DeleteContactResult = null) : \ascio\v2\DeleteContactResponse {
		$this->set("DeleteContactResult", $DeleteContactResult);
		return $this;
	}
	public function getDeleteContactResult () : ?\ascio\v2\Response {
		return $this->get("DeleteContactResult", "\\ascio\\v2\\Response");
	}
	public function createDeleteContactResult () : \ascio\v2\Response {
		return $this->create ("DeleteContactResult", "\\ascio\\v2\\Response");
	}
}