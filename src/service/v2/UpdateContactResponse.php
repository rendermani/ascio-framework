<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateContactResponse

namespace ascio\service\v2;
use ascio\db\v2\UpdateContactResponseDb;
use ascio\api\v2\UpdateContactResponseApi;
use ascio\base\v2\ResponseRootElement;


class UpdateContactResponse extends ResponseRootElement  {

	protected $_apiProperties=["UpdateContactResult"];
	protected $_apiObjects=["UpdateContactResult"];
	protected $UpdateContactResult;

	public function setUpdateContactResult (?\ascio\v2\Response $UpdateContactResult = null) : self {
		$this->set("UpdateContactResult", $UpdateContactResult);
		return $this;
	}
	public function getUpdateContactResult () : ?\ascio\v2\Response {
		return $this->get("UpdateContactResult", "\\ascio\\v2\\Response");
	}
	public function createUpdateContactResult () : \ascio\v2\Response {
		return $this->create ("UpdateContactResult", "\\ascio\\v2\\Response");
	}
}