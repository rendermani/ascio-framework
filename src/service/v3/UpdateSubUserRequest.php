<?php

// XSLT-WSDL-Client. Generated PHP class of UpdateSubUserRequest

namespace ascio\service\v3;
use ascio\base\v3\Base;
use ascio\db\v3\UpdateSubUserRequestDb;
use ascio\api\v3\UpdateSubUserRequestApi;


class UpdateSubUserRequest extends Base  {

	protected $_apiProperties=["SubUser"];
	protected $_apiObjects=["SubUser"];
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