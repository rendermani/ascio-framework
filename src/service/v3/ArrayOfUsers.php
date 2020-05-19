<?php

// XSLT-WSDL-Client. Generated PHP class of ArrayOfUsers

namespace ascio\service\v3;
use ascio\base\v3\ArrayBase;
use ascio\db\v3\ArrayOfUsersDb;
use ascio\api\v3\ArrayOfUsersApi;


class ArrayOfUsers extends ArrayBase implements \Iterator  {

	protected $_apiProperties=["UserInfo"];
	protected $_apiObjects=["UserInfo"];
	protected $UserInfo;

	public function setUserInfo (?Iterable $UserInfo = null) : self {
		$this->set("UserInfo", $UserInfo);
		return $this;
	}
	public function getUserInfo () : ?Iterable {
		return $this->get("UserInfo", "\\ascio\\v3\\UserInfo");
	}
	public function createUserInfo () : \ascio\v3\UserInfo {
		return $this->create ("UserInfo", "\\ascio\\v3\\UserInfo");
	}
	public function addUserInfo () : \ascio\v3\UserInfo {
		return $this->add("UserInfo","\\ascio\\v3\\UserInfo",func_get_args());
	}
}