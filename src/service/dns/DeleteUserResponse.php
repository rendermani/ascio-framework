<?php

// XSLT-WSDL-Client. Generated PHP class of DeleteUserResponse

namespace ascio\service\dns;
use ascio\db\dns\DeleteUserResponseDb;
use ascio\api\dns\DeleteUserResponseApi;
use ascio\base\dns\ResponseRootElement;


class DeleteUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["DeleteUserResult"];
	protected $_apiObjects=["DeleteUserResult"];
	protected $DeleteUserResult;

	public function setDeleteUserResult (?\ascio\dns\Response $DeleteUserResult = null) : self {
		$this->set("DeleteUserResult", $DeleteUserResult);
		return $this;
	}
	public function getDeleteUserResult () : ?\ascio\dns\Response {
		return $this->get("DeleteUserResult", "\\ascio\\dns\\Response");
	}
	public function createDeleteUserResult () : \ascio\dns\Response {
		return $this->create ("DeleteUserResult", "\\ascio\\dns\\Response");
	}
}