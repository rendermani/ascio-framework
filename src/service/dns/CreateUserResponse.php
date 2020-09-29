<?php

// XSLT-WSDL-Client. Generated PHP class of CreateUserResponse

namespace ascio\service\dns;
use ascio\db\dns\CreateUserResponseDb;
use ascio\api\dns\CreateUserResponseApi;
use ascio\base\dns\ResponseRootElement;


class CreateUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["CreateUserResult"];
	protected $_apiObjects=["CreateUserResult"];
	protected $CreateUserResult;

	public function setCreateUserResult (?\ascio\dns\Response $CreateUserResult = null) : self {
		$this->set("CreateUserResult", $CreateUserResult);
		return $this;
	}
	public function getCreateUserResult () : ?\ascio\dns\Response {
		return $this->get("CreateUserResult", "\\ascio\\dns\\Response");
	}
	public function createCreateUserResult () : \ascio\dns\Response {
		return $this->create ("CreateUserResult", "\\ascio\\dns\\Response");
	}
}