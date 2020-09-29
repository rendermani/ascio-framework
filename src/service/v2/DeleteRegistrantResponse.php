<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteRegistrantResponse

namespace ascio\service\v2;
use ascio\db\v2\DeleteRegistrantResponseDb;
use ascio\api\v2\DeleteRegistrantResponseApi;
use ascio\base\v2\ResponseRootElement;


class DeleteRegistrantResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteRegistrantResult"];
	protected $_apiObjects=["DeleteRegistrantResult"];
	protected $DeleteRegistrantResult;

	public function setDeleteRegistrantResult (?\ascio\v2\Response $DeleteRegistrantResult = null) : self {
		$this->set("DeleteRegistrantResult", $DeleteRegistrantResult);
		return $this;
	}
	public function getDeleteRegistrantResult () : ?\ascio\v2\Response {
		return $this->get("DeleteRegistrantResult", "\\ascio\\v2\\Response");
	}
	public function createDeleteRegistrantResult () : \ascio\v2\Response {
		return $this->create ("DeleteRegistrantResult", "\\ascio\\v2\\Response");
	}
}