<?php

// XSLT-WSDL-Client. Generated PHP class of GetUserResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\GetUserResponseDb;
use ascio\api\dns\GetUserResponseApi;


class GetUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetUserResult", "user"];
	protected $_apiObjects=["GetUserResult", "user"];
	protected $GetUserResult;
	protected $user;

	public function setGetUserResult (?\ascio\dns\Response $GetUserResult = null) : \ascio\dns\GetUserResponse {
		$this->set("GetUserResult", $GetUserResult);
		return $this;
	}
	public function getGetUserResult () : ?\ascio\dns\Response {
		return $this->get("GetUserResult", "\\ascio\\dns\\Response");
	}
	public function createGetUserResult () : \ascio\dns\Response {
		return $this->create ("GetUserResult", "\\ascio\\dns\\Response");
	}
	public function setUser (?\ascio\dns\User $user = null) : \ascio\dns\GetUserResponse {
		$this->set("user", $user);
		return $this;
	}
	public function getUser () : ?\ascio\dns\User {
		return $this->get("user", "\\ascio\\dns\\User");
	}
	public function createUser () : \ascio\dns\User {
		return $this->create ("user", "\\ascio\\dns\\User");
	}
}