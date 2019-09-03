<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteNameServerResponse

namespace ascio\service\v2;
use ascio\base\v2\ResponseRootElement;
use ascio\db\v2\DeleteNameServerResponseDb;
use ascio\api\v2\DeleteNameServerResponseApi;


abstract class DeleteNameServerResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteNameServerResult"];
	protected $_apiObjects=["DeleteNameServerResult"];
	protected $DeleteNameServerResult;

	public function setDeleteNameServerResult (?\ascio\v2\Response $DeleteNameServerResult = null) : self {
		$this->set("DeleteNameServerResult", $DeleteNameServerResult);
		return $this;
	}
	public function getDeleteNameServerResult () : ?\ascio\v2\Response {
		return $this->get("DeleteNameServerResult", "\\ascio\\v2\\Response");
	}
	public function createDeleteNameServerResult () : \ascio\v2\Response {
		return $this->create ("DeleteNameServerResult", "\\ascio\\v2\\Response");
	}
}