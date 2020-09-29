<?php

// XSLT-WSDL-Client. Generated PHP class of GetSubUserResponse

namespace ascio\service\v3;
use ascio\db\v3\GetSubUserResponseDb;
use ascio\api\v3\GetSubUserResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetSubUserResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "SubUser", "UserRights"];
	protected $_apiObjects=["Errors", "SubUser", "UserRights"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $SubUser;
	protected $UserRights;

	public function setSubUser (?\ascio\v3\UserInfo $SubUser = null) : self {
		$this->set("SubUser", $SubUser);
		return $this;
	}
	public function getSubUser () : ?\ascio\v3\UserInfo {
		return $this->get("SubUser", "\\ascio\\v3\\UserInfo");
	}
	public function createSubUser () : \ascio\v3\UserInfo {
		return $this->create ("SubUser", "\\ascio\\v3\\UserInfo");
	}
	public function setUserRights (?\ascio\v3\ArrayOfstring $UserRights = null) : self {
		$this->set("UserRights", $UserRights);
		return $this;
	}
	public function getUserRights () : ?\ascio\v3\ArrayOfstring {
		return $this->get("UserRights", "\\ascio\\v3\\ArrayOfstring");
	}
	public function createUserRights () : \ascio\v3\ArrayOfstring {
		return $this->create ("UserRights", "\\ascio\\v3\\ArrayOfstring");
	}
}