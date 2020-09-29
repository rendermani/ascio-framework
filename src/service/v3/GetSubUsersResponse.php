<?php

// XSLT-WSDL-Client. Generated PHP class of GetSubUsersResponse

namespace ascio\service\v3;
use ascio\db\v3\GetSubUsersResponseDb;
use ascio\api\v3\GetSubUsersResponseApi;
use ascio\v3\AbstractResponse;
use ascio\api\v3\AbstractResponseApi;


class GetSubUsersResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "SubUsers"];
	protected $_apiObjects=["Errors", "SubUsers"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $SubUsers;

	public function setSubUsers (?\ascio\v3\ArrayOfUsers $SubUsers = null) : self {
		$this->set("SubUsers", $SubUsers);
		return $this;
	}
	public function getSubUsers () : ?\ascio\v3\ArrayOfUsers {
		return $this->get("SubUsers", "\\ascio\\v3\\ArrayOfUsers");
	}
	public function createSubUsers () : \ascio\v3\ArrayOfUsers {
		return $this->create ("SubUsers", "\\ascio\\v3\\ArrayOfUsers");
	}
}