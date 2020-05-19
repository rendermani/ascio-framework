<?php

// XSLT-WSDL-Client. Generated PHP class of CreateSubUserResponse

namespace ascio\service\v3;
use ascio\v3\AbstractResponse;
use ascio\db\v3\CreateSubUserResponseDb;
use ascio\api\v3\CreateSubUserResponseApi;
use ascio\api\v3\AbstractResponseApi;


class CreateSubUserResponse extends AbstractResponse  {

	protected $_apiProperties=["ResultCode", "ResultMessage", "Errors", "SubUser"];
	protected $_apiObjects=["Errors", "SubUser"];
	protected $_substituted = true;
	protected $ResultCode;
	protected $ResultMessage;
	protected $Errors;
	protected $SubUser;

	public function setSubUser (?\ascio\v3\User $SubUser = null) : self {
		$this->set("SubUser", $SubUser);
		return $this;
	}
	public function getSubUser () : ?\ascio\v3\User {
		return $this->get("SubUser", "\\ascio\\v3\\User");
	}
	public function createSubUser () : \ascio\v3\User {
		return $this->create ("SubUser", "\\ascio\\v3\\User");
	}
}