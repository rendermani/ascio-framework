<?php

// XSLT-WSDL-Client. Generated PHP class of GetUserResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\GetUserResponseDb;
use ascio\api\dns\GetUserResponseApi;


abstract class GetUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["GetUserResult", "user"];
	protected $_apiObjects=["GetUserResult", "user"];
	protected $GetUserResult;
	protected $user;

	/**
	* Getters and setters for API-Properties
	*/
	public function setGetUserResult (?\ascio\dns\Response $GetUserResult = null) : self {
		$this->set("GetUserResult", $GetUserResult);
		return $this;
	}
	public function getGetUserResult () : ?\ascio\dns\Response {
		return $this->get("GetUserResult", "\\ascio\\dns\\Response");
	}
	public function createGetUserResult () : \ascio\dns\Response {
		return $this->create ("GetUserResult", "\\ascio\\dns\\Response");
	}
	public function setUser (?\ascio\dns\User $user = null) : self {
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