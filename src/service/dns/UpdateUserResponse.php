<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateUserResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\UpdateUserResponseDb;
use ascio\api\dns\UpdateUserResponseApi;


class UpdateUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["UpdateUserResult"];
	protected $_apiObjects=["UpdateUserResult"];
	protected $UpdateUserResult;

	public function setUpdateUserResult (?\ascio\dns\Response $UpdateUserResult = null) : self {
		$this->set("UpdateUserResult", $UpdateUserResult);
		return $this;
	}
	public function getUpdateUserResult () : ?\ascio\dns\Response {
		return $this->get("UpdateUserResult", "\\ascio\\dns\\Response");
	}
	public function createUpdateUserResult () : \ascio\dns\Response {
		return $this->create ("UpdateUserResult", "\\ascio\\dns\\Response");
	}
}