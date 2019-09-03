<?php

// XSLT-WSDL-Client. Generated PHP class of SearchUserResponse

namespace ascio\service\dns;
use ascio\base\dns\ResponseRootElement;
use ascio\db\dns\SearchUserResponseDb;
use ascio\api\dns\SearchUserResponseApi;


abstract class SearchUserResponse extends ResponseRootElement  {

	protected $_apiProperties=["SearchUserResult", "userNames"];
	protected $_apiObjects=["SearchUserResult", "userNames"];
	protected $SearchUserResult;
	protected $userNames;

	public function setSearchUserResult (?\ascio\dns\Response $SearchUserResult = null) : self {
		$this->set("SearchUserResult", $SearchUserResult);
		return $this;
	}
	public function getSearchUserResult () : ?\ascio\dns\Response {
		return $this->get("SearchUserResult", "\\ascio\\dns\\Response");
	}
	public function createSearchUserResult () : \ascio\dns\Response {
		return $this->create ("SearchUserResult", "\\ascio\\dns\\Response");
	}
	public function setUserNames (?\ascio\dns\ArrayOfstring $userNames = null) : self {
		$this->set("userNames", $userNames);
		return $this;
	}
	public function getUserNames () : ?\ascio\dns\ArrayOfstring {
		return $this->get("userNames", "\\ascio\\dns\\ArrayOfstring");
	}
	public function createUserNames () : \ascio\dns\ArrayOfstring {
		return $this->create ("userNames", "\\ascio\\dns\\ArrayOfstring");
	}
}